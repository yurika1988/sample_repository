<?php
// 下記のようにlesson1のファイルをインポートしてください。
// (他のファイルを参照する関数はいくつかあるので調べてください。)
// (lesson1の文字列がそのまま出力されてしまっていても大丈夫とします。)


// 下記のクラスを作成してください。

// Patient 
// lesson1からPersonを継承

// height: float 身長（ｍ）private
// weight: float 体重 (kg) private

// __construct(name: string, age:int, gender: string, height: float, weight: float)
// 名前、年齢、性別、身長、体重を受け取り初期化する。

// calculateStandardWeight() :float
// 平均体重を返す （身長 × 身長 × 22)

// getHeight()
// 身長を返す

// getWeight()
// 体重を返す

// クラスが完成したら適当なインスタンスを生成し、
// それぞれの関数を使用して下記のフォーマットで出力してください。

// 〇〇さんの身長は〇〇mなので平均体重は〇〇kgです。 現在の体重は〇〇kgです。

require_once 'lesson1.php';

class Patient extends Person {
    public float $height;
    public float $weight;

    public function __construct($name,$age,$gender,$height, $weight){
        parent::__construct($name, $age, $gender);
        $this->height = $height;
        $this->weight = $weight;
    }

    public function calculateStandardWeight(){
        return ($this->height / 100) * ($this->height / 100) * 22;
    }

    public function getHeigth(){
        return $this->height / 100;
    }

    public function getWeigth(){
        return $this->weight;
    }
}
$patient = new Patient("渡部",0,"",165.0, 50.0);
echo $patient->name."さんの身長は".$patient->getHeigth()
."mなので平均体重は".$patient->calculateStandardWeight()
."kgです。現在の体重は".$patient->getWeigth()."kgです。";

?>
