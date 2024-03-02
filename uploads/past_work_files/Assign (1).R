############################
#Q1 - gambling game
############################
#i - Write the code necessary to perform a single turn of the game.
# Function to perform a single turn of the game
single_turn <- function() {
  # Randomly choose a bet between 10 and 100 in multiples of 5
  bet <- sample(seq(from = 10, to = 100, by = 5), size = 1)
  # Simulate the roll of a pair of dice
  diceQ1 <- sample(1:6, size = 1, replace = TRUE)
  diceQ2 <- sample(1:6, size = 1, replace = TRUE)
  # Determine the outcome of the roll
  outcome <- ifelse(diceQ1 + diceQ2 == 11 | diceQ1 + diceQ2 == 33 | diceQ1 + diceQ2 == 55,
                    -bet, # lose the entire bet
                    ifelse(diceQ1 + diceQ2 == 22 | diceQ1 + diceQ2 == 44,
                           2*bet, # win twice the bet
                           ifelse(diceQ1 + diceQ2 == 66,
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
  # Simulate the roll of 2 dices
  dices1 <- sample(1:6, size = 2, replace = TRUE)
  # Determine the outcome of the roll
  if (sum(dices1) %in% c(11, 33, 55)) {
    # Lose the bet
    betReturn <- -bet
  } else if (sum(dices1) %in% c(22, 44)) {
    # Win twice the bet
    betReturn <- bet * 2
    message("You won money!")
  } else if (sum(dices1) == 12) {
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
  dices1 <- sample(1:6, 2, replace = TRUE)
  roll <- sum(dices1)
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
  dices1 <- sample(1:6, 2, replace = TRUE)
  roll <- sum(dices1)
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
#i - mean of sepal_length based on the species of iris_dataset 
d1 <- aggregate(iris$Sepal.Length, list(iris$Species), FUN=mean)
d1
#To use the aggregate function for mean,for that need to check the numeric variable in the 1st argument, 
#followed by categorical(list) on the 2nd and the function(mean) on the 3rd.

#ii - Other way of mean of sepal_length based on the species of iris_dataset
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
Q3 <- read.csv("./data/Red_wine_Quality.csv",header=TRUE,sep=";")
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
Q3 <- read.csv("./data/Red_wine_Quality.csv", header = TRUE, sep = ";")
str(Q3)
head(Q3)
# create a subset of the wine data with only the pH, alcohol, and quality columns
wine_subset <- Q3[, c("fixed.acidity", "volatile.acidity", "citric.acid", "residual.sugar","chlorides","free.sulfur.dioxide","total.sulfur.dioxide","density","pH","sulphates","alcohol", "quality")]
# calculate the mean values for each wine variable grouped by quality level
mean_values <- aggregate(wine_subset, by = list(wine_subset$quality), FUN = mean)
mean_values
# Plot multiple lines for mean wine variables versus quality
plot(mean_values$quality, mean_values$fixed.acidity, type = "b", pch = 16, col="red", xlab="Quality", ylab="Wine Variable(log)", ylim=c(0, max(mean_values$fixed.acidity, mean_values$volatile.acidity, mean_values$residual.sugar)))
lines(mean_values$quality, mean_values$volatile.acidity, type = "b", pch = 15, col="coral")
lines(mean_values$quality, mean_values$citric.acid, type = "b", pch = 1, col="blue")
lines(mean_values$quality, mean_values$residual.sugar, type = "b", pch = 8, col="yellow")
lines(mean_values$quality, mean_values$chlorides, type = "b", pch = 12, col="pink")
lines(mean_values$quality, mean_values$free.sulfur.dioxide, type = "b", pch = 14, col="red")
lines(mean_values$quality, mean_values$total.sulfur.dioxide, type = "b", pch = 11, col="blue")
lines(mean_values$quality, mean_values$density, type = "b", pch = 9, col="#00FF66FF")
lines(mean_values$quality, mean_values$pH, type = "b", pch = 10, col="#0066FFFF")
lines(mean_values$quality, mean_values$sulphates, type = "b", pch = 3, col="#CC00FFFF")
lines(mean_values$quality, mean_values$alcohol, type = "b", pch = 13, col="green")
legend("topright", legend=c("fixed.acidity", "volatile.acidity","citric.acid", "residual.sugar","chlorides","free.sulfur.dioxide","total.sulfur.dioxide","density","pH","sulphates","alcohol"), col = c("red","coral","blue","yellow","pink","red","blue","#00FF66FF","#0066FFFF","#CC00FFFF","green"), pch = c(16, 15, 1,8,12,16,7,9,10,3,5), lty=1)
# add a title to the chart
title(main = "Mean of Wine Variables versus Quality")


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
matri1 <- function(m1){
m1 <- matrix(mat1.data,nrow=3,ncol=3,byrow=TRUE)
print(m1)
best_cor <- which(m1 == max(m1), arr.ind = TRUE)
print(best_cor) #best correlation is 2nd row and 3rd column from the matrix, 0.476166324
worst_cor <- which(m1 == min(m1), arr.ind = TRUE)
print(worst_cor) #worst correlation is first row and first column, 3rd row and first column from the matrix, -0.25613089
}
matri1()


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
  indices <- floor(n * probs + 1)
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
dataQ4 <- iris$Sepal.Length
# Calculate the median, quartiles, and interquartile range
median_val <- median(data)
q1 <- quantile(dataQ4, 0.25)
q3 <- quantile(dataQ4, 0.75)
da1 <- q3 - q1
# Calculate the upper and lower whiskers
upper_whisker <- min(max(dataQ4), q3 + 1.5 * da1)
lower_whisker <- max(min(dataQ4), q1 - 1.5 * da1)
# Create a crude boxplot
plot(NULL, xlim = c(0, 2), ylim = c(min(dataQ4) - 1, max(dataQ4) + 1), yaxt = "n", xaxt = "n")
box() # draw the box
segments(1, q1, 2, q1) # draw the lower line of the box
segments(1, q3, 2, q3) # draw the upper line of the box
segments(1.5, q1, 1.5, q3) # draw the vertical line of the box
segments(1, median_val, 2, median_val) # draw the median line
segments(1.5, upper_whisker, 1.5, q3) # draw the upper whisker
segments(1.5, lower_whisker, 1.5, q1) # draw the lower whisker
points(rep(1.5, length(dataQ4)), dataQ4, pch = 16) # draw the data points
axis(2) # add y-axis
axis(1, at = 1:2, labels = c("Data", "Boxplot")) # add x-axis with labels


#iii - mtcars
#plot1
# Load the mtcars dataset
data(mtcars)
# Define the colours based on the levels of the variable "carb"
cols <- c("red", "blue", "green", "purple", "pink", "coral")
# Create a blank plot with the appropriate x and y limits
plot(mtcars$disp, mtcars$hp, type = "n", xlab = "Displacement", ylab = "Horsepower", xlim = range(mtcars$disp), ylim = range(mtcars$hp))
# Create a vector of labels for each point, including the "carb" value
labels <- mtcars$carb
# Use the text() function to display the labels at the corresponding x and y coordinates
text(mtcars$disp, mtcars$hp, labels = labels, col = cols[mtcars$carb], cex = 0.8)
# Add a legend for the carburetor values
legend("topleft", legend = unique(mtcars$carb), col = cols[unique(mtcars$carb)],title="Carbs", pch = 1)

#plot2
# Load the mtcars dataset
data(mtcars)
# Define the colours based on the levels of the variable "cyl"
cols <- c("coral", "blue", "purple")
# Create a blank plot with the appropriate x and y limits
plot(mtcars$disp, mtcars$hp, type = "n", xlab = "Displacement", ylab = "Horsepower", xlim = range(mtcars$disp), ylim = range(mtcars$hp))
# Create a vector of labels for each point, including the "cyl" value
labels <- mtcars$cyl
# Use the text() function to display the labels at the corresponding x and y coordinates
text(mtcars$disp, mtcars$hp, labels = labels, col = cols[mtcars$cyl], cex = 0.8)
# Add a legend for the carburetor values
legend("topleft", legend = unique(mtcars$cyl), col = cols[unique(mtcars$cyl)],title="Cyls", pch = 1)







