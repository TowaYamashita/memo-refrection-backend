# memo-reflection-backend

ふりかえりを記録するアプリケーションのバックエンド

## エンドポイント一覧

|エンドポイント名|HTTPメソッド|説明|補足|
|:--|:--|:--|:--|
|/sanctum/csrf-cookie|GET|CSRF保護を有効にする|これを叩いて返ってきたCSRFトークンを後続のリクエストヘッダーのX-XSRF-TOKENにセットする必要がある|
|/api/login|POST|ユーザでログインする||
|/api/register|POST|ユーザを登録する||
|/api/reflections?page={page}|GET|ふりかえりを取得する(一度に1件ずつ)|ログインしていないと取得できない。取得できるふりかえりはログインしているユーザに紐づくものだけ|
|/api/reflection|POST|ふりかえりを登録する|ログインしていないと登録できない。ふりかえりはログインしているユーザに紐づく|
|/api/reflection/{id}|DELETE|ルートパラメータのIDに紐づくふりかえりを削除する|ログインしていないと削除できない。削除できるふりかえりはログインしているユーザに紐づくものだけ|

## 開発環境のセットアップ

```
git clone https://github.com/TowaYamashita/memo-refrection-backend.git
cd memo-refrection-backend
code .
```

- Laravel Sail で devcontainer 入り開発環境を用意したため、VSCodeを開くだけで済む

## デプロイ

```
fly deploy
```
