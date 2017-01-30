<?php
class Jemaat extends AppModel {
 public $name = 'Jemaat';
 public function pendidikan() {
        $arr = array(
                        'Tidak Sekolah'=>'Tidak Sekolah',
                        'TK'=>'TK','SD'=>'SD',
                        'SMP'=>'SMP','SMA'=>'SMA',
                        'D1'=>'D1','D2'=>'D2','D3'=>'D3',
                        'S1'=>'S1','S2'=>'S2','S3'=>'S3',
                        'Lain-lain'=>'Lain-lain'
                    );
        return $arr;
    }
public function jenskel() {
        $arr = array(
                        'P'=>'Perempuan', 
                        'L'=>'Laki-laki'
                    );
        return $arr;
    }

public function goldar(){
        $arr = array(
            '-'=>'-',
            'A'=>'A',
            'B'=>'B',
            'O'=>'O',
            'AB'=>'AB'
            );
        return $arr;
    }

public function penghasilan(){
        $arr = array(
        '-'=>'-','<500.000'=>'<500.000',
        '500.000 s/d < 1.000.000'=>'500.000 s/d < 1.000.000',
        '1.000.000 s/d < 2.000.000'=>'1.000.000 s/d < 2.000.000',
        '2.000.000 s/d < 3.000.000'=>'2.000.000 s/d < 3.000.000',
        '3.000.000 s/d < 4.000.000'=>'3.000.000 s/d < 4.000.000',
        '> 4.000.000'=>'> 4.000.000'
        );
        return $arr;
   }


public function statustempat(){
        $arr = array(
        'Milik sendiri'=>'Milik sendiri',
        'Kontrak / Sewa'=>'Kontrak / Sewa',
        'Milik Orang Tua'=>'Milik Orang Tua',
        'Milik Saudara'=>'Milik Saudara',
        'Numpang'=>'Numpang','Lain-lain'=>'Lain-lain'
        );
        return $arr;
   }

public function hubkel(){
    $arr = array(
        'Kepala Keluarga'=>'Kepala Keluarga',
        'Istri'=>'Istri',
        'Anak'=>'Anak',
        'Orang Tua'=>'Orang Tua',
        'Saudara'=>'Saudara',
        'Menantu'=>'Menantu',
        'Cucu'=>'Cucu',
        'Kakek / Nenek'=>'Kakek / Nenek',
        'Numpang'=>'Numpang',
        'Lain - lain'=>'Lain - lain'
        );
    return $arr;
}
public function stpernikahan(){
    $arr = array(
        'Belum Kawin'=>'Belum Kawin',
        'Kawin'=>'Kawin',
        'Cerai'=>'Cerai',
        'Cerai Mati'=>'Cerai Mati'
        );
    return $arr;
}
public function ttcara(){
    $arr = array(
        'Kristiani'=>'Kristiani', 
        'Non Kristiani'=>'Non Kristiani', 
        'Lain - lain'=>'Lain - lain'
        );
    return $arr;
}
public function stwarga(){
    $arr = array(
        'Warga'=>'Warga', 
        'Tamu'=>'Tamu', 
        'Warga Belajar'=>'Warga Belajar'
        );
    return $arr;
}

public function tptkbkt(){
    $arr = array(
        'Induk' =>'Induk',
        'Wilayah'=>'Wilayah', 
        'Gereja'=>'Gereja'
        );
    return $arr;
}

public function prngrj(){
    $arr = array(
        'Jemaat'=>'Jemaat',
        'Majelis'=>'Majelis',
        'Pengurus Wilayah'=>'Pengurus Wilayah',
        'Pengurus Komisi'=>'Pengurus Komisi'
        );
    return $arr;
}

public function kepanitiaan(){
    $arr = array(
        '-'=>'-',
        '1-5 kali'=>'1-5 kali',
        '6-20 kali'=>'6-20 kali',
        '> 20 kali'=>'> 20 kali'
        );
    return $arr;
}

public $belongsTo = array(
        'Job' => array(
            'className' => 'Job',
            'foreignKey' => 'job_id'
        ),
        
        'Kodepos' => array(
            'className' => 'Kodepos',
            'foreignKey' => 'kodepos_sekarang'
        ),

        'Kodepos' => array(
            'className' => 'Kodepos',
            'foreignKey' => 'kodepos_domisili'
        )
    );

 public $hasAndBelongsToMany = array(
        'Minatgereja' => array(
            'className' => 'Minatgereja',
            'joinTable'=>'jemaats_minatgereja',
            'foreignKey' => 'idjemaat',
            'associationForeignKey'=> 'idminatgereja'
        ),
        'Minatumum' => array(
            'className' => 'Minatumum',
            'joinTable'=>'jemaats_minatumum',
            'foreignKey' => 'idjemaat',
            'associationForeignKey'=> 'idminatumum'
        )
    );
 //public $name = 'Contact';
    
    public $validate = array(
        'name' => 'notEmpty',
        'email' => array(
            'rule' => 'email',
            'message' => 'Please enter a valid Email Address'
        ),
        'message' => 'notEmpty',
        'filename' => array(
            // http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::uploadError
            'uploadError' => array(
                'rule' => 'uploadError',
                'message' => 'Something went wrong with the file upload',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),
            // http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::mimeType
            'mimeType' => array(
                'rule' => array('mimeType', array('image/gif','image/png','image/jpg','image/jpeg')),
                'message' => 'Invalid file, only images allowed',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),
            // custom callback to deal with the file upload
            'processUpload' => array(
                'rule' => 'processUpload',
                'message' => 'Something went wrong processing your file',
                'required' => FALSE,
                'allowEmpty' => TRUE,
                'last' => TRUE,
            )
        )
    );
    
 
}
