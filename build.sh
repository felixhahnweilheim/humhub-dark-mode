#!/bin/bash

# 1) Recompile CSS files and extract colors
# 1a) DARKHUMHUB
cd resources/DarkHumHub
lessc less/build.less css/theme.css

# Note: Unfortunately the color extractor removes the CSS variables
css-color-extractor css/theme.css css/theme.css --format=css

# Re-add CSS variables and compress CSS
cp css/theme.css css/temporary.less
lessc less/build2.less css/theme.css --clean-css="--s1 --advanced" --source-map=../css/theme.css.map
rm css/temporary.less

# 1b) DARKENTERPRISE
cd ../DarkEnterprise
lessc less/build.less css/theme.css
css-color-extractor css/theme.css css/theme.css --format=css

cp css/theme.css css/temporary.less

lessc less/build2.less css/theme.css --clean-css="--s1 --advanced" --source-map=../css/theme.css.map
rm css/temporary.less

cd ../../

# 2) Update message files
cd ../../
php yii message/extract-module dark-mode
cd modules/dark-mode
