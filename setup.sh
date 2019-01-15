#!/usr/bin/env bash
COLOR_BLACK="\033[30m"
COLOR_RED="\033[31m"
COLOR_GREEN="\033[32m"
COLOR_YELLOW="\033[33m"
COLOR_BLUE="\033[34m"
COLOR_PINK="\033[35m"
COLOR_CYAN="\033[36m"
COLOR_WHITE="\033[37m"
COLOR_NORMAL="\033[0;39m"

echo_color_green() {
	msg=$1
	printf $COLOR_GREEN
	echo $msg;
	printf $COLOR_NORMAL
}

echo_color_yellow() {
	msg=$1
	printf $COLOR_YELLOW
	echo $msg;
	printf $COLOR_NORMAL
}

echo_color_yellow "Begin install"

echo_color_green "Command: composer install"
composer install
cp .env.example .env
php artisan key:generate

echo_color_yellow "End install"
