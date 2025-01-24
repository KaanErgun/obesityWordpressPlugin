#!/bin/bash

# Set the plugin folder name
PLUGIN_FOLDER="OBESITYWORDPRESSPLUGIN"
ZIP_FILE="${PLUGIN_FOLDER}.zip"

# Navigate to the folder containing the plugin
cd "$(dirname "$0")"

# Check if the plugin folder exists
if [ -d "$PLUGIN_FOLDER" ]; then
  # Remove existing zip file if it exists
  if [ -f "$ZIP_FILE" ]; then
    echo "Removing old zip file..."
    rm "$ZIP_FILE"
  fi

  # Create a zip file from the plugin folder
  echo "Creating zip file for $PLUGIN_FOLDER..."
  zip -r "$ZIP_FILE" "$PLUGIN_FOLDER"

  echo "Zip file created: $ZIP_FILE"
else
  echo "Error: Plugin folder '$PLUGIN_FOLDER' not found!"
  exit 1
fi
