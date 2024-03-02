#include <iostream>
#include "Msaini.cpp"

using namespace std;

Bird *bird;


sf::Texture* upperPipe;
sf::Texture* lowerPipe;

class Pipe {
private:
    float x;
    float y;
    bool scored;

public:
    Pipe() {
        x = (float)(window->getSize().x + upperPipe->getSize().x);
        y = 100.0f + (float)(rand()%5 - 3) * 50;
        scored = false;
    }

    sf::FloatRect getUpperRect() const {
        auto size = upperPipe->getSize();
        return {
                x, y + 340,
                (float)size.x, (float)size.y
        };
    }

    sf::FloatRect getLowerRect() const {
        auto size = upperPipe->getSize();
        return {
                x, y - 340,
                (float)size.x, (float)size.y
        };
    }

    void draw() const {
        sf::Sprite upperSprite(*upperPipe);
        upperSprite.setPosition(x, y+340);
        sf::Sprite lowerSprite(*lowerPipe);
        lowerSprite.setPosition(x, y-340);

        window->draw(upperSprite);
        window->draw(lowerSprite);
    }

    void update() {
        if (not gameRunning or gameOvered) return;

        x -= 100 * delta;
        auto birdRect = bird->getRect();

        if (birdRect.intersects(getUpperRect()) or birdRect.intersects(getLowerRect())) {
            gameOvered = true;
        }

        if (x + upperPipe->getSize().x < birdRect.left and not scored) {
            scored = true;
            score++;
        }

    }

};