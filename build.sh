#!/bin/bash

# Recompile CSS files
cd resources/DarkHumHub/less
lessc ./build.less ../css/theme.css --clean-css="--s1 --advanced" --source-map=../css/theme.css.map
cd ../../DarkEnterprise/less
lessc ./build.less ../css/theme.css --clean-css="--s1 --advanced" --source-map=../css/theme.css.map
cd ../../..

# Update message files
cd ../../ php yii message/extract-module dark-mode
cd modules/dark-mode
