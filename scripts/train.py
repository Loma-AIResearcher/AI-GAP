import torch
import torch.nn as nn
import torch.optim as optim
import torchvision
import torchvision.transforms as transforms
import os

# Define a simple neural network by subclassing nn.Module
class SimpleNN(nn.Module):
    def __init__(self):
        super(SimpleNN, self).__init__()
        self.fc1 = nn.Linear(28*28, 128)  # First fully connected layer (input: 28*28, output: 128)
        self.fc2 = nn.Linear(128, 64)  # Second fully connected layer (input: 128, output: 64)
        self.fc3 = nn.Linear(64, 10)  # Third fully connected layer (input: 64, output: 10 classes for MNIST)

    def forward(self, x):
        x = x.view(-1, 28*28)  # Flatten the input image to a 1D tensor
        x = torch.relu(self.fc1(x))  # Apply ReLU activation after the first layer
        x = torch.relu(self.fc2(x))  # Apply ReLU activation after the second layer
        x = self.fc3(x)  # Output layer
        return x

# Define a transformation to normalize the data
transform = transforms.Compose([transforms.ToTensor(),  # Convert images to PyTorch tensors
                                transforms.Normalize((0.5,), (0.5,))])  # Normalize the images

# Load the MNIST training dataset
trainset = torchvision.datasets.MNIST(root='./data', train=True, download=True, transform=transform)
# Create a DataLoader for the training dataset
trainloader = torch.utils.data.DataLoader(trainset, batch_size=32, shuffle=True)  # Shuffle the data

# Load the MNIST test dataset
testset = torchvision.datasets.MNIST(root='./data', train=False, download=True, transform=transform)
# Create a DataLoader for the test dataset
testloader = torch.utils.data.DataLoader(testset, batch_size=32, shuffle=False)  # Do not shuffle the test data

# Initialize the neural network
net = SimpleNN()
# Define the loss function (cross-entropy loss for classification)
criterion = nn.CrossEntropyLoss()
# Define the optimizer (Stochastic Gradient Descent)
optimizer = optim.SGD(net.parameters(), lr=0.01, momentum=0.9)  # Learning rate = 0.01, momentum = 0.9

# Train the network for 2 epochs
for epoch in range(2):  # Loop over the dataset multiple times
    running_loss = 0.0  # Initialize running loss
    for i, data in enumerate(trainloader, 0):
        inputs, labels = data  # Get the inputs and labels from the DataLoader
        
        optimizer.zero_grad()  # Zero the parameter gradients
        
        outputs = net(inputs)  # Forward pass: compute the network output
        loss = criterion(outputs, labels)  # Compute the loss
        
        loss.backward()  # Backward pass: compute the gradients
        optimizer.step()  # Update the weights
        
        running_loss += loss.item()  # Accumulate the loss
        if i % 100 == 99:  # Print every 100 mini-batches
            print(f"[{epoch + 1}, {i + 1}] loss: {running_loss / 100:.3f}")  # Print the average loss
            running_loss = 0.0  # Reset running loss

print("Finished Training")  # Print when training is done

# Save the trained model's parameters to a file
os.makedirs('models', exist_ok=True)  # Ensure the models directory exists
torch.save(net.state_dict(), "models/simple_nn.pth")

correct = 0  # Initialize the correct predictions count
total = 0  # Initialize the total predictions count
with torch.no_grad():  # Disable gradient calculation for evaluation
    for data in testloader:
        images, labels = data  # Get the inputs and labels from the DataLoader
        outputs = net(images)  # Forward pass: compute the network output
        _, predicted = torch.max(outputs.data, 1)  # Get the index of the max log-probability
        total += labels.size(0)  # Increment the total count
        correct += (predicted == labels).sum().item()  # Increment the correct count

print(f"Accuracy of the network on the 10000 test images: {100 * correct / total:.2f}%")  # Print the accuracy
