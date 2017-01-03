#!/bin/sh
export ANDROID_HOME=/home/santiago/Android/Sdk
rm -rf platforms/android
php build.php
phonegap platform add android
php icons.php
phonegap build android
~/Android/Sdk/platform-tools/adb install -r platforms/android/build/outputs/apk/android-debug.apk