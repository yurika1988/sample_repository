<?php
require_once ROOT_PATH . 'Controllers/Controller.php';
require_once ROOT_PATH . 'Models/contact.php';

class ContactController extends Controller
{
    public function index()
    {
        $errorMessages = $_SESSION['errorMessages'] ?? [];
        $post = $_SESSION['post'] ?? [];
        $_SESSION['errorMessages'] = [];
        $_SESSION['post'] = [];

        // Contactモデルからデータを取得する（例：すべての問い合わせを取得）
        $contactModel = new Contact();
        $contacts = $contactModel->getAllContacts(); // このメソッドは適宜作成する必要があります

        // 取得したデータとエラーメッセージ、投稿内容をビューに渡す
        $this->view('contact/index', ['contacts' => $contacts, 'errorMessages' => $errorMessages, 'post' => $post]);
    }
    public function read()
{
    $errorMessages = [];

    $referer = @$_SERVER['HTTP_REFERER'];
    if (empty($referer)) {
        // リファラーが存在しない場合、直接アクセスされたとみなしてエラーメッセージを表示し、indexアクションにリダイレクト
        $errorMessages['directAccess'] = '直接アクセスは禁止されています。';
        $_SESSION['errorMessages'] = $errorMessages;
        header('Location: /contact/index');
        exit();
    }
        if (empty($_POST['name'])) {
            $errorMessages['name'] = '氏名を入力してください。';
        } elseif (mb_strlen($_POST['name']) > 10) {
            $errorMessages['name'] = '氏名は10文字以内で入力してください。';
        }
        // フリガナのバリデーション
        if (empty($_POST['kana'])) {
            $errorMessages['kana'] = 'フリガナを入力してください。';
        } elseif (mb_strlen($_POST['kana']) > 10) {
            $errorMessages['kana'] = 'フリガナは10文字以内で入力してください。';
        }
        // 電話番号のバリデーション（数字とハイフンのみを許可）
        if (!empty($_POST['tel']) && !preg_match('/^[0-9\-]+$/', $_POST['tel'])) {
            $errorMessages['tel'] = '氏名は数字入力です。';
        }
        // メールアドレスのバリデーション
        if (empty($_POST['email'])) {
            $errorMessages['email'] = 'メールアドレスを入力してください。';
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errorMessages['email'] = 'メールアドレスには「@」を含む形式で入力してください。。';
        }
        // お問い合わせ内容のバリデーション
        if (empty($_POST['body'])) {
            $errorMessages['body'] = 'お問い合わせ内容を入力してください。';
        }
        // エラーメッセージがあればセッションに格納して入力値とともに入力画面にリダイレクト
        if (!empty($errorMessages)) {
            $_SESSION['errorMessages'] = $errorMessages;
            $_SESSION['post'] = $_POST;
            header('Location: /contact/index');
            exit;
        }
        // エラーがなければ、入力値を次の画面に渡して表示
        $this->view('contact/readpage', $_POST);
    }
    public function create()
    {
        $referer = @$_SERVER['HTTP_REFERER'];
    if (empty($referer)) {
        // リファラーが存在しない場合、直接アクセスされたとみなしてエラーメッセージを表示し、indexアクションにリダイレクト
        $errorMessages['directAccess'] = '直接アクセスは禁止されています。';
        $_SESSION['errorMessages'] = $errorMessages;
        header('Location: /contact/index');
        exit();
    }
        //登録処理
        $user = new Contact;
        $result = $user->create(
            $_POST['name'],
            $_POST['kana'],
            $_POST['tel'],
            $_POST['email'],
            $_POST['body']
        );
        if (is_numeric($result)) {
            $_SESSION['auth'] = $result;
            $this->view('contact/completion');
            exit;
        } else {
            // 登録に失敗した場合はエラーメッセージを表示し、確認画面にリダイレクト
            $_SESSION['errorMessages'] = ['登録に失敗しました。再度お試しください。'];
            $_SESSION['post'] = $_POST;
            header('Location: /contact/readpage');
        }
    }
    public function edit()
    {
        $referer = @$_SERVER['HTTP_REFERER'];
    if (empty($referer)) {
        // リファラーが存在しない場合、直接アクセスされたとみなしてエラーメッセージを表示し、indexアクションにリダイレクト
        $errorMessages['directAccess'] = '直接アクセスは禁止されています。';
        $_SESSION['errorMessages'] = $errorMessages;
        header('Location: /contact/index');
        exit();
    }
        // GETパラメータからIDを取得
        $contactId = $_GET['id'];
        // エラーメッセージがセッションにあれば取得する
        $errorMessages = $_SESSION['errorMessages'] ?? [];
        // $contactIdを元にお問い合わせ情報を取得する処理
        $contactModel = new Contact();
        $contact = $contactModel->getContactById($contactId);
        // ビューにお問い合わせ情報とエラーメッセージを渡して更新画面を表示する
        $this->view('contact/edit', ['contact' => $contact, 'errorMessages' => $errorMessages]);
        // 表示が終了したのでセッションのエラーメッセージをクリアする
        unset($_SESSION['errorMessages']);
    }
    public function update()
    {
        // POSTパラメータからIDと更新内容を取得
        $contactId = $_POST['id'];
        $name = $_POST['name'];
        $kana = $_POST['kana'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $body = $_POST['body'];

        // バリデーションチェック
        $errorMessages = [];

        if (empty($name)) {
            $errorMessages['name'] = '氏名を入力してください。';
        } elseif (mb_strlen($name) > 10) {
            $errorMessages['name'] = '氏名は10文字以内で入力してください。';
        }
        // フリガナのバリデーション
        if (empty($kana)) {
            $errorMessages['kana'] = 'フリガナを入力してください。';
        } elseif (mb_strlen($kana) > 10) {
            $errorMessages['kana'] = 'フリガナは10文字以内で入力してください。';
        }
        // 電話番号のバリデーション（数字とハイフンのみを許可）
        if (!empty($tel) && !preg_match('/^[0-9\-]+$/', $tel)) {
            $errorMessages['tel'] = '氏名は数字入力です。';
        }
        // メールアドレスのバリデーション
        if (empty($email)) {
            $errorMessages['email'] = 'メールアドレスを入力してください。';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMessages['email'] = 'メールアドレスには「@」を含む形式で入力してください。';
        }
        // お問い合わせ内容のバリデーション
        if (empty($body)) {
            $errorMessages['body'] = 'お問い合わせ内容を入力してください。';
        }
        // エラーメッセージがあればセッションに格納して編集画面にリダイレクト
        if (!empty($errorMessages)) {
            $_SESSION['errorMessages'] = $errorMessages;
            header('Location: /contact/edit?id=' . $contactId);
            exit;
        }
        // モデルを使用してデータベースを更新
        $contactModel = new Contact();
        $success = $contactModel->updateContact($contactId, $name, $kana, $tel, $email, $body);

        if ($success) {
            header('Location: /contact/index');
        } else {
            // 更新に失敗した場合はエラーメッセージを表示して編集画面に戻る
            $_SESSION['errorMessages'] = ['更新に失敗しました。再度お試しください。'];
            header('Location: /contact/edit?id=' . $contactId);
            exit;
        }
    }
    public function delete()
    {
        // リクエストパラメーターから連絡先の ID を取得
        $contactId = $_GET['id'] ?? null;
        if ($contactId === null) {
            // ID が指定されていない場合、処理を中止してトップページにリダイレクト
            header('Location: /');
            exit();
        }
        // Contact モデルのインスタンスを作成し、削除メソッドを呼び出す
        $contact = new Contact;
        $contact->deleteContact($contactId);
        // 削除が成功した場合、トップページにリダイレクト
        header('Location: /contact/index');
        exit();
    }
}
