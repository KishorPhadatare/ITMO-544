#!/bin/bash

sudo apt-get update
sudo apt-get install -y apache
sudo systemctl enable apache
sudo systemctl start apache
sudo systemctl status apache