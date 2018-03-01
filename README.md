# Virgil Security, Inc. Main Website

## Development

All of the source files are in `/static` folder. To develop locally:

1. Move to `/static` folder

```bash
cd static
```

2. Install dependencies

```bash
npm install
```

3. Start dev server

```bash
npm run serve
```

4. Open `http://localhost:8080` in a browser

## Running Wordpress locally

1. Run `docker-compose up -d`
2. Open http://localhost:8080 in a web browser
3. Activate _virgilsecurity_ theme
4. Activate all plugins, except kirki (problems detected)
5. Go to Appearance -> Customize to apply starter content
6. Go to Settings -> Permalinks and select Post Name (for urls to look pretty)

## Publishing updates

Connect to Wordpress server over ftp and upload changed files manually.
