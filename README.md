# Simple MNIST & PyTorch

This project demonstrates a simple neural network implemented using PyTorch to classify handwritten digits from the MNIST dataset.

## Project Structure

- \`data/\`: Directory for storing the MNIST data.
- \`models/\`: Directory for saving trained models.
- \`notebooks/\`: Directory for Jupyter notebooks.
- \`scripts/\`: Directory for Python scripts.
- \`.gitignore\`: Git ignore file to exclude unnecessary files.
- \`README.md\`: Project description and instructions.

## Getting Started

### Prerequisites

- Python 3.x
- PyTorch
- torchvision
- Jupyter Notebook (optional, for running the notebook)

### Installing

1. Clone the repository:
   \`\`\`bash
   git clone https://github.com/yourusername/simple-mnist-pytorch.git
   cd simple-mnist-pytorch
   \`\`\`

2. Install the required packages:
   \`\`\`bash
   pip install torch torchvision
   \`\`\`

## Usage

### Running the Training Script

You can run the training script using the following command:

\`\`\`bash
python scripts/train.py
\`\`\`

### Running the Jupyter Notebook

If you prefer to use Jupyter Notebook, you can find the notebook in the \`notebooks/\` directory:

\`\`\`bash
jupyter notebook notebooks/simple_mnist_pytorch.ipynb
\`\`\`

## Training

The neural network is trained on the MNIST dataset for 2 epochs. The training process prints the loss every 100 mini-batches. After training, the model is saved in the \`models/\` directory.

## Evaluation

The trained model is evaluated on the test dataset, and the accuracy is printed.

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is licensed under the MIT License.
EOL
