@component('mail::message')
# Visitor Message

Some Visitor Left a message:
<br><br>
Firstname: {{ $firstname }}
<br>
を編集
ファイルにメールを送信テストするための設定をする
Ajax でコンタクトフォームの情報をメール送信させる
コンタクトフォームの記入した情報を Ajax で送信してメールも送信させる。
Secondname: {{ $secondname }}
<br>
Email: {{ $email }}
<br>
Subject: {{ $subject }}
<br>
Message: {{ $message }}
@component('mail::button', ['url' => ''])
View Message
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent