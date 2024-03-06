<?php
//下記のようなクラスを作成してください。
// Person
// name  : string
// age   : int
// gender: string

// __construct(name:string, age:int, gender:string)
// 名前、年齢、 性別を受け取ってプロパティを初期化する。

// selfIntroduction(): string
// 私の名前は〇〇です。年齢は〇〇歳です。性別は〇〇です。 という文字列を出力する。

// addAge(): void
// 誕生日が来ました。 という文字列を出力し、年齢を＋１する。


// クラスができたら適当なインスタンスを作成し、
// 自己紹介→年齢加算→自己紹介の順にメソッドを動かして年齢を確認してください。

class Person{
    private String $name;
    private int $age;
    private String $gender;

    public function __construct($name,$age,$gender){
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
    }    
    public function selfIntroduction(){
            return "私の名前は".$this->name."です。"."年齢は".$this->age."歳です。"."性別は".$this->gender."です。";
        }
    public function addAge($years = 1){
        $this->age += $years;
        return "誕生日がきました。";
    }
    public function getName(){
        return $this->name;
    }
}
    $person = new Person("川﨑",35,"女性");
    echo $person->selfIntroduction();
    echo "<br>";
    echo $person->addAge();
    echo "<br>";
    echo $person->selfIntroduction();
    echo "<br>";



?>



