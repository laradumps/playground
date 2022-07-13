#!/bin/bash
                  #╔═════════════════════╗#
                  #║   LaraDumps Doc     ║#
                  #╚═════════════════════╝#

# ══════════════ STYLES ═════════

NC='\033[0m'
WHITE='\033[1;37m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
LABEL_ERROR="\n\033[048;5;9m ERROR ${NC} "
LABEL_OK="\n\033[048;5;64m   OK   ${NC} "

#Ascii Logo enconded in Base64
LOGO=$(echo -n "XDAzM1sxOzMzbSAgICAgICAgIF9fICAgICAgICAgICAgICAgICAgICBfX19fXyAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICB8IHwgICAgICAgICAgICAgICAgICAgfCAgX18gXCAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgIHwgfCAgICAgX18gXyBfIF9fIF9fIF98IHwgIHwgfF8gICBfIF8gX18gX19fICBfIF9fICBfX18gCiAgICAgICAgfCB8ICAgIC8gX2AgfCAnX18vIF9gIHwgfCAgfCB8IHwgfCB8ICdfIGAgXyBcfCAnXyBcLyBfX3wKICAgICAgICB8IHxfX198IChffCB8IHwgfCAoX3wgfCB8X198IHwgfF98IHwgfCB8IHwgfCB8IHxfKSBcX18gXAogICAgICAgIHxfX19fX19cX18sX3xffCAgXF9fLF98X19fX18vIFxfXyxffF98IHxffCB8X3wgLl9fL3xfX18vCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfCB8ICAgICAgICAKICAgICAgICAgIGh0dHBzOi8vbGFyYWR1bXBzLmRldiAgICAgICAgICAgICAgICAgICAgICB8X3wgICAgXDAzM1swbQ==" | base64 --decode)

# ══════════════ FUNCTIONS ═════════

hasEnvFile() {
    if [ !  -f ./.env ]; then
      echo -e "${LABEL_ERROR}.env does not exist. Run ${YELLOW}cp .env.example .env ${NC} and add your database credentials".
      exit 1;
    fi
}

checkNpm () {
  if ! npm --version >/dev/null 2>&1; then
    echo -e "${LABEL_ERROR}${GREEN}Npm${NC} is required! Visit: https://nodejs.org/en/"
    exit 1;
  fi
}

checkComposer () {
  if ! composer --version >/dev/null 2>&1; then
    echo -e "${LABEL_ERROR}Composer is required! Visit: https://getcomposer.org for instructions."
    exit 1;
  fi
}

composerInstall () {
  if [ ! -d ./vendor ]; then
    echo -e "Installing project dependencies with composer..."

    composer install

    if [ ! $? -eq 0 ]; then
        echo -e "${LABEL_ERROR}Error installing dependencies with composer!"
        exit 1;
    fi
  fi
}

compileAssets () {
  echo -e "Compiling assets..."

  npm install && npm run dev

  if [ ! $? -eq 0 ]; then
      echo -e "${LABEL_ERROR}Error compiling assets..."
      exit 1;
  fi
}

generateAppKey() {
    HAS_KEY=$(grep APP_KEY=base64 .env)

    if [  -f ./.env ] && [ -z "$HAS_KEY"  ]; then
        echo -e "generating Laravel App Key... 🗝️"
        php artisan key:generate --ansi

        if [ ! $? -eq 0 ]; then
              echo -e "${LABEL_ERROR}App Key was not generated!"
              exit 1;
        fi
    fi
}

migrateDb() {
    php artisan migrate --seed
}

# ══════════════ SCRIPT ═════════

echo -e "${YELLOW}${LOGO}${NC}\n"

checkComposer
checkNpm
hasEnvFile
composerInstall
generateAppKey
compileAssets
migrateDb

source ./.env

echo -e "${LABEL_OK}All good! Start sending ${YELLOW}ds()${NC} dumps...\n"
echo -e "This project is using default app host configuration: ${YELLOW}${DS_APP_HOST}:${DS_APP_PORT}${NC}.\n"

echo -e "1. Open the LaraDumps desktop application.\n"
echo -e "2. To send some dumps, run:\n    ${YELLOW}php artisan ds:all${NC}\n"
echo -e "3. When finished, run the command below to try the Livewire example:\n    ${YELLOW}php artisan serve${NC}"
