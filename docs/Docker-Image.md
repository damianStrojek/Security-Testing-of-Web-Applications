# Docker Image

Docker makes it relatively straightforward to containerize web applications and databases. Here's a general outline of the steps to achieve this:

## Basic Web Application deploy

Create a Dockerfile in the root directory of your website project. This file defines the steps to build a Docker image for your web application. Here's a dockerfile for STEWA (Security Testing of Web Applications) project:

```dockerfile
# Use an official Python runtime as a parent image
FROM python:3.8

# Set the working directory
WORKDIR /app

# Copy the current directory contents into the container at /app
COPY . /app

# Install any needed packages specified in requirements.txt
RUN pip install -r requirements.txt

# Make port 80 available to the world outside this container
EXPOSE 80

# Define the command to run your application
# Replace "app.py" with the command needed to run your Python web server.
CMD ["python", "app.py"]
```

To deploy the environment locally you need to `clone` this repository and host it using one of many ways. 

```bash
# Get the latest version of docker
sudo apt-get install docker.io

# Hosting HTTP server on port 80 of localhost using docker container
git clone https://github.com/damianStrojek/Security-Testing-of-Web-Applications.git
cd Security-Testing-of-Web-Applications
docker build -t stewa .
docker run -dp 127.0.0.1:80:80 stewa

# Check status of your container
docker ps
```

## Adding MySQL Support

If you want to include a MySQL database instance, it's a good practice to use Docker Compose to manage multiple containers. Create a docker-compose.yml file for this purpose. Here's an example:

```yaml
version: '3'
services:
  web:
    build: .
    ports:
      - "80:80"
  db:
    image: mysql:5.7
    environment:
      MYSQL_ROOT_PASSWORD: root
      MYSQL_DATABASE: root
```

In this example, you have two services, "web" for your web application and "db" for MySQL. You can customize the environment variables as needed.

Open a terminal in the directory containing your Docker Compose file and run the following command to start your containers:

```bash
docker-compose up
```

This will build the web application container based on your Dockerfile and start the MySQL container.