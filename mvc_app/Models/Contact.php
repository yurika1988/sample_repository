<?php
require_once(ROOT_PATH . 'Models/Db.php');

class Contact extends Db
{

    public function __construct($dbh = null)
    {
        parent::__construct($dbh);
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

/**
     * 問い合わせ内容をデータベースに追加する
     * @param string $name 氏名
     * @param string $kana フリガナ
     * @param string $tel 電話番号
     * @param string $email メールアドレス
     * @param string $body 問い合わせ内容
     * @return int|bool 登録された問い合わせのID、または登録に失敗した場合はfalse
     */
    public function create(string $name, string $kana, string $tel, string $email, string $body)
   {
    try {
        $this->dbh->beginTransaction();
        $query = 'INSERT INTO contacts (name, kana, tel, email, body) VALUES (:name, :kana, :tel, :email, :body)';
        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':kana', $kana, PDO::PARAM_STR);
        $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':body', $body, PDO::PARAM_STR);
        $stmt->execute();

        $lastId = $this->dbh->lastInsertId();

        // トランザクションを完了することでデータの書き込みを確定させる
        $this->dbh->commit();

        return $lastId;
    } catch (PDOException $e) {
        // 不具合があった場合トランザクションをロールバックして変更をなかったコトにする。
        $this->dbh->rollBack();
        echo "登録失敗: " . $e->getMessage() . "\n";
        exit();
    }
}
    public function getAllContacts()
    {
        try {
            // 問い合わせ内容をすべて取得するクエリを準備
            $query = "SELECT * FROM contacts";
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();
            
            // 結果を連想配列として取得
            $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $contacts;
        } catch (PDOException $e) {
            // エラーハンドリング（例外処理）
            echo "データの取得に失敗しました: " . $e->getMessage();
            exit();
        }
    }
    public function getContactById($contactId)
{
    try {
        $query = "SELECT * FROM contacts WHERE id = :id";
        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id', $contactId, PDO::PARAM_INT);
        $stmt->execute();
        $contact = $stmt->fetch(PDO::FETCH_ASSOC);
        return $contact;
    } catch (PDOException $e) {
        // エラー処理
        echo "エラー: " . $e->getMessage();
        exit();
    }
}
public function updateContact($contactId, $name, $kana, $tel, $email, $body)
{
    try {
        $query = "UPDATE contacts SET name = :name, kana = :kana, tel = :tel, email = :email, body = :body WHERE id = :id";
        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id', $contactId, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':kana', $kana, PDO::PARAM_STR);
        $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':body', $body, PDO::PARAM_STR);
        $stmt->execute();
        return true; // 更新成功
    } catch (PDOException $e) {
        // エラー処理
        echo "エラー: " . $e->getMessage();
        return false; // 更新失敗
    }
}
public function deleteContact($contactId)
{
    try{
        // トランザクション開始
        $this->dbh->beginTransaction();
        // 削除クエリの実行
        $query = 'DELETE FROM contacts WHERE id = :id';
        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id', $contactId, PDO::PARAM_INT);
        $stmt->execute();
        // トランザクションコミット
        $this->dbh->commit();
        // 成功した場合は何も返さない
    } catch (PDOException $e) {
        // トランザクションロールバック
        $this->dbh->rollBack();
        // エラーメッセージを出力して処理を中断
        echo "退会失敗: " . $e->getMessage() . "\n";
        exit();
    }
}
}