# wp-theme
webpackを使ったWordPress開発のテンプレート

## Flocss設計

## 環境
* webpack 5
* node.js 16系

## 
初期設定
```

$ npm install

```

webpack.config.js
```

new BrowserSyncPlugin({
  host: "localhost",
  port: 3000,
  proxy: "URL", ←wordpress local環境のurlを指定
}),

```


サーバー起動
```
$ npm run start
```

ビルド
```
