#!/bin/bash

if command -v podman-compose &>/dev/null; then
    docker_compose_command='podman-compose'
else
    docker_compose_command='docker-compose'
fi

start() {
    $docker_compose_command -f ./8001/docker-compose.yml up -d
    $docker_compose_command -f ./8002/docker-compose.yml up -d
    $docker_compose_command -f ./8003/docker-compose.yml up -d
    $docker_compose_command -f ./8004/docker-compose.yml up -d
    $docker_compose_command -f ./8005/docker-compose.yml up -d
}

start
