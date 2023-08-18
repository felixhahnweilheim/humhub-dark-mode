#!/bin/bash

# Recompile CSS files and extract colors
cd resources/DarkHumHub
lessc less/build.less css/theme.css --clean-css="--s1 --advanced" --source-map=../css/theme.css.map
css-color-extractor css/theme.css css/theme.css --format=css
cd ../DarkEnterprise
lessc less/build.less css/theme.css --clean-css="--s1 --advanced" --source-map=../css/theme.css.map
css-color-extractor css/theme.css css/theme.css --format=css
cd ../../

# Update message files
cd ../../ php yii message/extract-module dark-mode
cd modules/dark-mode
