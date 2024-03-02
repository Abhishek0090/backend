############################
#Q1 - gambling game
############################
#i - Write the code necessary to perform a single turn of the game.
# Function to perform a single turn of the game
single_turn <- function() {
  # Randomly choose a bet between 10 and 100 in multiples of 5
  bet <- sample(seq(from = 10, to = 100, by = 5), size = 1)
  # Simulate the roll of a pair of dice
  dice1 <- sample(1:6, size = 1, replace = TRUE)
  dice2 <- sample(1:6, size = 1, replace = TRUE)
  # Determine the outcome of the roll
  outcome <- ifelse(dice1 + dice2 == 11 | dice1 + dice2 == 33 | dice1 + dice2 == 55,
                    -bet, # lose the entire bet
                    ifelse(dice1 + dice2 == 22 | dice1 + dice2 == 44,
                           2*bet, # win twice the bet
                           ifelse(dice1 + dice2 == 66,
                                  5*bet, # win five times the bet
                                  -0.5*bet) # lose half the bet
                    )
  )
  # Print the bet and the return values
  cat("You bet $", bet, " and got back $", outcome, "\n")
  # Print additional messages for a win or jackpot win
  if (outcome == 2*bet) {
    cat("You won money!\n")
  } else if (outcome == 5*bet) {
    cat("Jackpot win!!!\n")
  }
}
single_turn()

#ii - Wrap the dice simulation and return calculator you developed (i)
betResult <- function(bet = 50) {
  # Define the possible bet values
  bet_values <- seq(from = 10, to = 100, by = 5)
  # Randomly choose a bet value if not specified
  if (missing(bet)) {
    bet <- sample(bet_values, size = 1)
  }
  # Simulate the roll of two dice
  dice <- sample(1:6, size = 2, replace = TRUE)
  # Determine the outcome of the roll
  if (sum(dice) %in% c(11, 33, 55)) {
    # Lose the bet
    betReturn <- -bet
  } else if (sum(dice) %in% c(22, 44)) {
    # Win twice the bet
    betReturn <- bet * 2
    message("You won money!")
  } else if (sum(dice) == 12) {
    # Win five times the bet
    betReturn <- bet * 5
    message("Jackpot win!!!")
  } else {
    # Lose half the bet
    betReturn <- -bet / 2
  }
  # Return the outcome of the bet
  return(betReturn)
}
betResult()
# Insert within another function, the code you wrote in (i) to randomly determine a bet
single_turn1 <- function() {
  # Randomly choose a bet
  bet <- betGenerator()
  # Simulate the roll of a pair of fair dice
  dice <- sample(1:6, 2, replace = TRUE)
  roll <- sum(dice)
  # Determine the outcome of the roll
  if (roll %in% c(11, 33, 55)) {
    return_value <- 0
  } else if (roll %in% c(22, 44)) {
    return_value <- 2 * bet
  } else if (roll == 66) {
    return_value <- 5 * bet
  } else {
    return_value <- 0.5 * bet
  }
  # Print the bet and return values
  cat(paste("Bet: $", bet, "\n"))
  cat(paste("Return: $", return_value, "\n"))
  # Print additional messages if necessary
  if (return_value == 2 * bet) {
    cat("You won money!\n")
  } else if (return_value == 5 * bet) {
    cat("Jackpot win!!!\n")
  }
  # Return the return value
  return(return_value)
}
# Function to randomly generate a bet
betGenerator <- function() {
  betAmount <- sample(c(10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85, 90, 95, 100), 1)
  return(betAmount)
}
betGenerator()
single_turn1()

#iii - Making use of the functions created in (ii)
# Single turn of the gambling game
single_turn <- function(bet) {
  # Simulate the roll of a pair of fair dice
  dice <- sample(1:6, 2, replace = TRUE)
  roll <- sum(dice)
  # Determine the outcome of the roll
  if (roll %in% c(11, 33, 55)) {
    return_value <- -bet
  } else if (roll %in% c(22, 44)) {
    return_value <- bet
  } else if (roll == 66) {
    return_value <- 4 * bet
  } else {
    return_value <- -0.5 * bet
  }
  # Print the bet and return values
  cat(paste("Bet =", bet, ", Dice outcome =", roll, ", Winnings =", return_value, "\n"))
  # Return the return value
  return(return_value)
}
# Function to randomly generate a bet
betGenerator <- function() {
  betAmount <- sample(c(10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85, 90, 95, 100), 1)
  return(betAmount)
}
betGenerator()
single_turn1()
# Simulate multiple turns of the gambling game
playGame <- function(turns = 10) {
  # Initialize the player's total winnings
  total_winnings <- 0
  # Play the specified number of turns
  for (i in 1:turns) {
    bet <- betGenerator() # Generate a random bet
    winnings <- single_turn(bet) # Play a single turn
    total_winnings <- total_winnings + winnings # Update total winnings
  }
  # Print the final result
  if (total_winnings >= 0) {
    cat(paste("You won $", total_winnings, "!\n"))
  } else {
    cat(paste("You lost $", -total_winnings, ".\n"))
  }

  # Return the total winnings
  return(total_winnings)
}
playGame()

#iv - What is the overall position for the player after one hundred turns of the game, where every turn consists of a $50 bet?
# Set up variables to track overall position
total_outlay <- 0
total_winnings <- 0
overall_profit <- 0
# Call playGame() function for 100 turns, with a fixed bet of $50 per turn
for (i in 1:100) {
  bet_return <- playGame(turns = 1)
  total_outlay <- total_outlay + 50
  total_winnings <- total_winnings + bet_return
}
# Calculate overall profit
overall_profit <- total_winnings - total_outlay
# Print results
cat("Total outlay: $", total_outlay, "\n")
cat("Total winnings: $", total_winnings, "\n")
cat("Overall profit: $", overall_profit, "\n")



######################
#2 IRIS
######################
data(iris)
head(iris)
#i - mean of Sepal:Length for each species of iris 
d1 <- aggregate(iris$Sepal.Length, list(iris$Species), FUN=mean)
d1
#To use the aggregate function for mean,first we need to specify the numerical variable on the first argument, 
#the categorical(list) on the second and the function to be applied (mean) on the third.

#ii - Other way of mean of Sepal:Length for each species of iris 
d2 <- tapply(iris$Sepal.Length, iris$Species, mean)
d2
#It splits the data of the 1st variable based on the levels of the 2nd variable. To each subgroup of data, it applies a function, in this case the mean

#iii - mean for each numeric column of the iris dataset
d3 <- apply(iris[,-5], 2, tapply, iris$Species, mean)
d3
#Used apply function, to check the numeric column I've removed the species column which is not numeric. Here I've applied mean function on the objects

#iv - tree structure
iris_tree <- list(name = "Species", children = list(
  list(name = "setosa", 
       children = list(list(name = "Sepal",
                            children = list(list(name = "Length"),list(name = "Width")))),
       children = list(list(name = "Petal",
                            children = list(list(name = "Length"),list(name = "Width"))))),                 
  list(name = "versicolor", 
       children = list(list(name = "Sepal",
                            children = list(list(name = "Length"),list(name = "Width")))),
       children = list(list(name = "Petal",
                            children = list(list(name = "Length"),list(name = "Width"))))),
  list(name = "virginica", 
       children = list(list(name = "Sepal",
                            children = list(list(name = "Length"),list(name = "Width")))),
       children = list(list(name = "Petal",
                            children = list(list(name = "Length"),list(name = "Width")))))
))
#That produces what you desire. This function assumes that the first column of the data.frame 
#you pass in contains the parent column and the second column has the child. 
#it also takes a root parameter which allows you to specify a starting points. 
#It will default to the first parent in the list.
maketreelist <- function(d3, root = d3[1, 1]) {
  if(is.factor(root)) root <- as.factor(root)
  r <- list(name = root)
  children = d3[d3[, 1] == root, 2]
  if(is.numeric(children)) children <- as.numeric(children)
  if(length(children) > 0) {
    r$children <- lapply(children, maketreelist, d3 = d3)
  }
  r
}
irislist <- maketreelist(d3)



#########################
#3 -Wine Quality
########################

#i - wine quality
library(ggplot2)
Q3 <- read.csv("./data/winequality-red.csv", header = TRUE, sep = ";")
str(Q3)
head(Q3)
#i
d1 = qplot(x = quality, y = alcohol, 
             data = Q3,
             geom = "boxplot")
d2 = qplot(x = quality, y = residual.sugar, 
             data = Q3,
             geom = "boxplot")
d3 = qplot(x = quality, y = density, 
             data = Q3,
             geom = "boxplot")
grid.arrange(d1, d2, d3, ncol = 2)
#Alcohol has greatest connection with quality
#Residual sugar has worst connection with quality


#ii - Various mean wine variables versus quality
#Q3$fixed.acidity <- mean(Q3$fixed.acidity)
#Q3$volatile.acidity <- mean(Q3$volatile.acidity)
Q3$quality <- as.numeric(Q3$quality)
str(Q3)
 #plot the first data series using plot()
 plot(Q3$quality, Q3$fixed.acidity, type="o", col="blue", pch="o", ylab="y", lty=1)
 #add second data series to the same chart using points() and lines()
 points(Q3$quality, Q3$volatile.acidity, col="red", pch="*")
 lines(Q3$quality, Q3$volatile.acidity, col="red",lty=2)
 #add third data series to the same chart using points() and lines()
 points(Q3$quality, Q3$citric.acid, col="dark red",pch="+")
 lines(Q3$quality, Q3$citric.acid, col="dark red", lty=3)
 #add a legend in top left corner of chart at (x, y) coordinates = (1, 19)
 legend(1,19,legend=c("y1","y2","y3"), col=c("blue","red","black"),
        pch=c("o","*","+"),lty=c(1,2,3), ncol=1)
 #generate an x-axis along with three data series
 Q3 <- read.csv("./data/winequality-red.csv", header = TRUE, sep = ";")
 x  <- mean(Q3$quality, na.rm = TRUE)
 y1 <- mean(Q3$fixed.acidity, na.rm = TRUE)
 y2 <- mean(Q3$volatile.acidity, na.rm = TRUE)
 y3 <- mean(Q3$citric.acid, na.rm = TRUE)
 #plot the first data series using plot()
 plot(x, y1, type="o", col="blue", pch="o", ylab="y", lty=1)
 #add second data series to the same chart using points() and lines()
 points(x, y2, col="red", pch="*")
 lines(x, y2, col="red",lty=2)
 #add third data series to the same chart using points() and lines()
 points(x, y3, col="dark red",pch="+")
 lines(x, y3, col="dark red", lty=3)
 #add a legend in top left corner of chart at (x, y) coordinates = (1, 19)
 legend(1,19,legend=c("y1","y2","y3"), col=c("blue","red","black"),
        pch=c("o","*","+"),lty=c(1,2,3), ncol=1)

 
#iii - correlation
a <- cor(Q3$fixed.acidity, Q3$volatile.acidity)
a
b <- cor(Q3$citric.acid, Q3$residual.sugar)
b
c <- cor(Q3$chlorides, Q3$free.sulfur.dioxide)
c
d <- cor(Q3$total.sulfur.dioxide, Q3$density)
d
e <- cor(Q3$pH, Q3$sulphates)
e
f <- cor(Q3$alcohol, Q3$quality)
f
mat1.data <- c(a,b,c,d,e,f)
matri1 <- function(mat1){
mat1 <- matrix(mat1.data,nrow=3,ncol=3,byrow=TRUE)
print(mat1)
best_cor <- which(mat1 == max(mat1), arr.ind = TRUE)
print(best_cor) #best correlation is 2nd row and 3rd column from the matrix, 0.476166324
worst_cor <- which(mat1 == min(mat1), arr.ind = TRUE)
print(worst_cor) #worst correlation is first row and first column, 3rd row and first column from the matrix, -0.25613089
}
matri1()
#

############################################
#Q4 - Visualization using basic R functions
############################################
#i - quantile
# Define the myQuantile function
myQuantile <- function(x, probs = seq(0, 1, 0.25), na.rm = FALSE) {
  # Sort data in ascending order
  sorted_x <- sort(x, na.last = TRUE)
  # Calculate the number of non-NA values
  n <- sum(!is.na(sorted_x))
  # Calculate the indices corresponding to the specified quantiles
  indices <- round(n * probs + 1)
  # Adjust indices for the case when the quantile falls exactly on an index
  indices <- ifelse(indices == n + 1, n, indices)
  # Compute the quantiles
  res <- sorted_x[indices]
  # Return the results
  return(res)
}
# Example dataset
x <- c(10, 5, 7, 8, 3, 6, 1, 9, 2, 4)
# Find the 50th percentile using myQuantile()
q25_myQuantile <- myQuantile(x, probs = 0.25, na.rm = TRUE)
# Print the result
print(q25_myQuantile)
# Find the 50th percentile using quantile()
q25_quantile <- quantile(x, probs = 0.25, na.rm = TRUE)
# Print the result
print(q25_quantile)


#ii - iris
# Create a vector of data
data <- iris$Sepal.Length
# Calculate the median, quartiles, and interquartile range
median_val <- median(data)
q1 <- quantile(data, 0.25)
q3 <- quantile(data, 0.75)
iqr <- q3 - q1
# Calculate the upper and lower whiskers
upper_whisker <- min(max(data), q3 + 1.5 * iqr)
lower_whisker <- max(min(data), q1 - 1.5 * iqr)
# Create a crude boxplot
plot(NULL, xlim = c(0, 2), ylim = c(min(data) - 1, max(data) + 1), yaxt = "n", xaxt = "n")
box() # draw the box
segments(1, q1, 2, q1) # draw the lower line of the box
segments(1, q3, 2, q3) # draw the upper line of the box
segments(1.5, q1, 1.5, q3) # draw the vertical line of the box
segments(1, median_val, 2, median_val) # draw the median line
segments(1.5, upper_whisker, 1.5, q3) # draw the upper whisker
segments(1.5, lower_whisker, 1.5, q1) # draw the lower whisker
points(rep(1.5, length(data)), data, pch = 16) # draw the data points
axis(2) # add y-axis
axis(1, at = 1:2, labels = c("Data", "Boxplot")) # add x-axis with labels


#iii - mtcars
#plot1
mod <- lm(disp ~hp, data=mtcars)
summary(mod)
plot(disp ~ hp, col="lightblue", pch=19, cex=2,data=mtcars)
text(disp ~hp, labels=carb,data=mtcars, cex=0.9, font=2)
# Add a legend
legend("topleft",title="Carbs",                                 
       legend = c(1,2,3,4,6,8),
       col = c("red", "green","blue","pink","#0066FFFF","#CC00FFFF"))
#plot2
mod <- lm(disp ~hp, data=mtcars)
summary(mod)
plot(disp ~ hp, col="lightblue", pch=19, cex=2,data=mtcars)
text(disp ~hp, labels=cyl,data=mtcars, cex=0.9, font=2)
# Add a legend
legend("topleft",title="Cyls",                                 
       legend = c(4,6,8),
       col = c("pink","#0066FFFF","#CC00FFFF"))



