# Use an official PHP runtime as a parent image
FROM php:alpine

# Set the working directory
WORKDIR /stewa

# Copy the current directory contents into the container at /stewa
COPY . /stewa

# Make port 80 available 
EXPOSE 80

# Run application
CMD ["php", "-S", "0.0.0.0:80"]