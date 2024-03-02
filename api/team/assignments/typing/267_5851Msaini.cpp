#include <vector>
#include <iostream>

using namespace std;

int score;
bool gameRunning, gameOvered;
float delta;
sf::RenderWindow *window;

sf::Texture *backgroundTexture;
class Bird {
private:
    sf::Texture *texture;
    float y;
    float vel;
    float currentFrame{};
    sf::Clock* animationClock;
    vector<sf::Texture*> frames;

public:
    Bird() {
        animationClock = new sf::Clock;

        for (const auto& path : {
            "res/textures/bird/1-2.png",
            "res/textures/bird/1-3.png",
            "res/textures/bird/1-2.png",
            "res/textures/bird/1-1.png",
        }) {
            auto frame = new sf::Texture();
            frame->loadFromFile(path);
            frames.push_back(frame);
        }
        texture = frames[0];

        y = 400;
        vel = 0;
    }

    ~Bird() {
        for (const auto& ptr : frames) {
            delete ptr;
        }
        delete animationClock;
    }

    sf::FloatRect getRect() {
        auto size = texture->getSize();
        return {
            50, y,
            (float)size.x, (float)size.y
        };
    }

    void flap() {
        if (not gameRunning or gameOvered) return;
        vel = -420;
    }

    void draw() {
        sf::Sprite birdSprite(*texture);
        birdSprite.setRotation(8*(vel / 400));
        birdSprite.setPosition(50, y);

        window->draw(birdSprite);
    }

    void update() {
        currentFrame += delta * 4;
        if (currentFrame > frames.size()) {
            currentFrame -= frames.size();
        }
        texture = frames[(int)currentFrame];
        if (gameRunning) {
            vel += delta * 1200;
            y += vel * delta;

            if (y < 0 or y + texture->getSize().y > backgroundTexture->getSize().y) {
                gameOvered = true;
            }

            if (y + texture->getSize().y > backgroundTexture->getSize().y) {
                y = (float)backgroundTexture->getSize().y - texture->getSize().y;
                vel = 0;
            }
        }
    }

};