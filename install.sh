#!/bin/sh
export ANDROID_HOME=/home/santiago/Android/Sdk
php build.php ; phonegap build android
~/Android/Sdk/platform-tools/adb install -r platforms/android/build/outputs/apk/android-debug.apk