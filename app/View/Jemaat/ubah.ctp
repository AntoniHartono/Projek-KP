<!DOCTYPE html>
<h3><i class="fa fa-angle-right"></i> <?php echo $this->Html->link('<i class="fa fa-user"></i> Manajemen Jemaat', 
array('action'=>'index'), 
array('escape'=>false)); 
?> / <i class="fa fa-pencil">
</i> Ubah Data Jemaat </h3>
<?php 
  echo $this->Form->create('Jemaat', array('class'=>'form-horizontal', 'role'=>'form'));        
  echo $this->Form->input('Jemaat.id', array('type'=>'hidden'));
?>
 <div class="panel-group" id="accordion">
    <div class="panel panel-info">
      <div class="panel-heading">
         <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" 
               href="#collapseTwo">
              Data Pribadi
            </a>
         </h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse">
         <div class="panel-body">
          <div class="form-group">   
              <?php  
                echo $this->Form->label('Jemaat.no_induk','Kode Jemaat', 'col-xs-2 control-label');
                echo $this->Form->input('no_induk', array('placeholder'=>"Nomor Induk",'label'=>false,'class'=>'form-control', 'div'=>array('class'=>'col-xs-4'))); 
              ?>
          </div> 
           <div class="form-group">
             <?php 
              echo $this->Form->label('Jemaat.nama', 'Nama Lengkap', 'col-xs-2 control-label');
              echo $this->Form->input('nama', array('label'=>false, 'placeholder'=>"Nama Lengkap", 'class'=>"form-control", 'div'=>array('class'=>'col-md-6')));?>
          </div> 
          <div class="form-group">  
              <?php
                echo $this->Form->label('Jemaat.jenis_kelamin', 'Jenis Kelamin', 'col-xs-2 control-label'); 
                $options = $jenskel;
                $attributes = array(
                    'legend'=>false, 
                    'label'=>false, 
                    'separator' => '&nbsp',
                    'id'=>'checkbox-inline'
                    );
                echo $this->Form->radio('jenis_kelamin', $options, $attributes);  
              ?>
          </div>
          </form>
          <div class="form-group">
              <?php
              echo $this->Form->label('Jemaat.tempat_lahir', 'Tempat/Tanggal Lahir', 'col-md-2 control-label');
              echo $this->Form->input('tempat_lahir', array('label'=>false, 'placeholder'=>"Tempat lahir", 'class'=>"form-control", 'div'=>array('class'=>'col-md-2')));
              echo $this->Form->input('tanggal_lahir', array(
              'class' => 'form-control',
              'placeholder' => 'Tanggal Lahir',
              'div' => array('class' => 'form-inline'),
              'label' => false,
              'dateFormat' => 'DMY'
              ));?>
              </div>
              <div class="form-group">
              <?php   
              echo $this->Form->label('', 'Kodepos Domisili', 'col-md-2 control-label');
              echo $this->Form->input(' ', array('placeholder'=>"Pilih area",'label'=>false, 'class'=>"form-control", 'id'=>"kodom", 'div'=>array('class'=>'col-md-4')));
              echo $this->Form->input('kodepos_domisili', array(
                'label'=>false,
                  'type'=>'hidden',
                  'id'=>'kodedom'));

              ?>
              </div>
              <div class="form-group">
              <?php 
              echo $this->Form->label('', ' ', 'col-md-2 control-label');
              echo $this->Form->input(' ', array('label'=>false, 'type'=>'textarea', 'readonly'=>'readonly','class'=>"form-control", 'id'=>"hasildom", 'div'=>array('class'=>'col-md-6')));
               ?>
               </div>
              <div class="form-group">
              <?php
              echo $this->Form->label('Jemaat.alamat_domisili', 'Alamat Domisili', 'col-md-2 control-label');
              echo $this->Form->input('alamat_domisili', array('placeholder'=>"Alamat Domisili",'type'=>'textarea','label'=>false, 'class'=>"form-control", 'div'=>array('class'=>'col-md-6')));             
              ?>
              <p>&nbsp</p>
             </div>
              <div class="form-group">
              <?php
              echo $this->Form->label('', 'Kodepos Sekarang', 'col-md-2 control-label');
              echo $this->Form->input('', array('placeholder'=>"Pilih area",'label'=>false, 'class'=>"form-control", 'id'=>"kosek", 'div'=>array('class'=>'col-md-4')));
              echo $this->Form->input('kodepos_sekarang', array(
                  'label'=>false,
                  'type' =>'hidden',
                  'id'=>'kodesek'));

               ?>
          </div> 
          <div class="form-group">
              <?php 
              echo $this->Form->label('', ' ', 'col-md-2 control-label');
              echo $this->Form->input(' ', array('label'=>false, 'type'=>'textarea', 'readonly'=>'readonly','class'=>"form-control", 'id'=>"hasilsek", 'div'=>array('class'=>'col-md-6')));
               ?>
          </div>  
          <div class="form-group">
              <?php
               echo $this->Form->label('Jemaat.alamat_sekarang', 'Alamat Sekarang', 'col-md-2 control-label');
              echo $this->Form->input('alamat_sekarang', array('placeholder'=>"Alamat Sekarang",'type'=>'textarea','label'=>false, 'class'=>"form-control", 'div'=>array('class'=>'col-md-6')));
              ?>
          </div>
          <div class="form-group">
              <?php
              echo $this->Form->label('Jemaat.no_telepon', 'Nomor Telepon', 'col-xs-2 control-label');
              echo $this->Form->input('no_telepon', array('placeholder'=>"No Telp",'label'=>false, 'class'=>"form-control", 'div'=>array('class'=>'col-xs-4')));
              ?>
             <?php
                echo $this->Form->label('Jemaat.goldar', 'Golongan Darah', 'col-xs-2 control-label');
                echo $this->Form->input('goldar', 
                array(
                  'options' => $goldar,
                  'class' => 'span5','label'=>false, 'class'=>"form-control", 'div'=>array('class'=>'col-xs-4')
              ));
              ?>  
                             
          </div>
          <div class="form-group" >    
            
            <?php 
                echo $this->Form->label('Jemaat.pendidikan_terakhir','Pendidikan Terakhir', 'col-md-2 control-label');
                echo $this->Form->input('pendidikan_terakhir', array(
                  'options' => $pendidikan,
                  'label'=>false,
                  'div'=>array('class'=>'col-xs-4'),
                  'class'=>"form-control"
                ));
            ?>  
            <?php
                echo $this->Form->label('Jemaat.job_id', 'Pekerjaan', 'col-md-2 control-label');
                echo $this->Form->input('job_id', 
                array(
                'options' => $jobs,
                'class' => 'span5','label'=>false, 'class'=>"form-control", 'div'=>array('class'=>'col-xs-4'),
                'error' => array('attributes' => array('label'=>false,'wrap' => 'span', 'class' => 'label custom-inline-error label-important help-inline'))));
            ?>
          </div>
         <div class="form-group">
           <?php 
                echo $this->Form->label('Jemaat.penghasilan','Penghasilan', 'col-sm-2 control-label');
                echo $this->Form->input('penghasilan', array(
                  'options' => $penghasilan,
                  'label'=>false,
                  'div'=>array('class'=>'col-xs-4'),
                  'class'=>"form-control"));
            ?>
            <?php 
                echo $this->Form->label('Jemaat.status_tmpt_tggl','Status Tempat Tinggal', 'col-md-2 control-label');
                echo $this->Form->input('status_tmpt_tggl', array(
                  'options' => $statustempat,
                  'label'=>false,
                  'div'=>array('class'=>'col-xs-4'),
                  'class'=>"form-control"
                  )
                );
            ?>
        </div>
        <div class="form-group">
        <?php
                echo $this->Form->label('Jemaat.gangguan_kesehatan', 'Gangguan Kesehatan', 'col-md-2 control-label');
                echo $this->Form->input('gangguan_kesehatan', array('placeholder'=>"Gangguan Kesehatan",'type'=>'textarea','label'=>false, 'class'=>"form-control", 'div'=>array('class'=>'col-md-6')));
            ?>   
        </div>                      
         </div>
      </div>
   </div>
   <div class="panel panel-info">
      <div class="panel-heading">
         <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" 
               href="#collapseThree">
              Data Keluarga
            </a>
         </h4>
      </div>
      <div id="collapseThree" class="panel-collapse collapse">
         <div class="panel-body">
          <div class="form-group" >
            <?php 
                echo $this->Form->label('Jemaat.hubungan_keluarga','Hubungan Keluarga', 'col-sm-2 control-label');
                echo $this->Form->input('hubungan_keluarga', array(
                  'options' => $hubkel,
                  'label'=>false,
                  'div'=>array('class'=>'col-sm-6'),
                  'class'=>"form-control",
                  'id'=>'hubungan'));
            ?>  
            <div class="form-group">
            </div>   
            <?php 
                echo $this->Form->label('Jemaat.kepala_keluarga','Nomor Induk Kepala Keluarga', 'col-sm-2 control-label');
                echo $this->Form->input('', array(
                  'label'=>false,
                  'div'=>array('class'=>'col-sm-6'),
                  'class'=>"form-control",
                  'id'=>'kepala',
                  'placeholder'=>'Nomor Induk Kepala Keluarga'));
                echo $this->Form->input('kepala_id', array(
                  'label'=>false,
                  'id'=>'inputkepala',
                  'type'=>"hidden"
                  ));
            ?>          
             <label id="log">
            </div>  
            <div class="form-group">
              <?php
              echo $this->Form->label('', ' ', 'col-md-2 control-label');
              echo $this->Form->input(' ', array('label'=>false,  'readonly'=>'readonly','class'=>"form-control", 'id'=>"hasilkk", 'div'=>array('class'=>'col-md-6')));
              ?>
          </div> 
          <div class="form-group">
            <?php
              echo $this->Form->label('Jemaat.nama_ayah', 'Nama Ayah', 'col-md-2 control-label');
              echo $this->Form->input('nama_ayah', array('label'=>false, 'placeholder'=>"Nama Ayah", 'class'=>"form-control", 'div'=>array('class'=>'col-md-6')));
            ?>
          </div> 
          <div class="form-group">
            <?php
              echo $this->Form->label('Jemaat.nama_ibu', 'Nama Ibu', 'col-md-2 control-label');
              echo $this->Form->input('nama_ibu', array('label'=>false, 'placeholder'=>"Nama Ibu", 'class'=>"form-control", 'div'=>array('class'=>'col-md-6')));
            ?>
        </div>   
        <div class="form-group" >
          <?php 
              echo $this->Form->label('Jemaat.status_pernikahan','Status Pernikahan', 'col-sm-2 control-label');
              echo $this->Form->input('status_pernikahan', array(
                'options' => $stpernikahan,
                'label'=>false,
                'div'=>array('class'=>'col-md-3'),
                'class'=>"form-control"));
          ?>             
        </div>   
        <div class="form-group" >
          <?php 
              echo $this->Form->label('Jemaat.tata_cara_pernikahan','Tata Cara Pernikahan', 'col-sm-2 control-label');
              echo $this->Form->input('tata_cara_pernikahan', array(
                'options' => $ttcara,
                'label'=>false,
                'div'=>array('class'=>'col-md-3'),
                'class'=>"form-control"));
          ?>    
        </div>   
        <div class="form-group" >        
          <?php
              echo $this->Form->label('Jemaat.jml_ank', 'Jumlah Anak', 'col-md-2 control-label');
              echo $this->Form->input('jml_ank', array('label'=>false, 'placeholder'=>"Jumlah Anak", 'class'=>"form-control", 'div'=>array('class'=>'col-md-2')));
              ?>
        </div>   
      </div>
    </div>
  </div>
<div class="panel panel-info">
  <div class="panel-heading">
    <h4 class="panel-title">
      <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
               Data Gereja
      </a>
    </h4>
  </div>
<div id="collapseFour" class="panel-collapse collapse">
  <div class="panel-body">
    <div class="form-group" >
          <?php 
              echo $this->Form->label('Jemaat.status_warga','Status Warga', 'col-xs-2 control-label');
              echo $this->Form->input('status_warga', array(
                'options' => $stwarga,
                'label'=>false,
                'div'=>array('class'=>'col-md-4'),
                'class'=>"form-control" ));
          ?>             
          <?php
            echo $this->Form->label('Jemaat.tpt_kebaktian', 'Tempat Kebaktian', 'col-xs-2 control-label');
            echo $this->Form->input('status_warga', array(
                'options' => $tptkbkt,
                'label'=>false,
                'div'=>array('class'=>'col-md-4'),
                'class'=>"form-control"
              )
             );
            ?>
        </div> 
        <div class="form-group">
           <?php
            echo $this->Form->label('Jemaat.peran_grj', 'Peran Gereja', 'col-xs-2 control-label');
            echo $this->Form->input('peran_grj', array(
                'options' => $prngrj,
                'label'=>false,
                'div'=>array('class'=>'col-md-4'),
                'class'=>"form-control"
              )
             );
            ?>
           <?php
            echo $this->Form->label('Jemaat.kepanitiaan', 'Kepanitiaan', 'col-xs-2 control-label');
            echo $this->Form->input('kepanitiaan', array(
                'options' => $kepanitiaan,
                'label'=>false,
                'div'=>array('class'=>'col-md-4'),
                'class'=>"form-control"
              )
             );
            ?>
          </div> 
          <div class="form-group">  
          <?php
            echo $this->Form->label('Jemaat.lama_jabatan_pengurus', 'Lama Jabatan Pengurus', 'col-xs-2 control-label');
            echo $this->Form->input('lama_jabatan_pengurus', array('label'=>false, 'placeholder'=>"Lama Jabatan Pengurus", 'class'=>"form-control", 'div'=>array('class'=>'col-md-4')));
            ?>
          <?php
            echo $this->Form->label('Jemaat.lama_jabatan_majelis', 'Lama Jabatan Majelis', 'col-xs-2 control-label');
            echo $this->Form->input('lama_jabatan_majelis', array('label'=>false, 'placeholder'=>"Lama Jabatan Majelis", 'class'=>"form-control", 'div'=>array('class'=>'col-md-4')));
            ?>
          </div> 
        <div class="form-group">
          <?php 
              echo $this->Form->label('Jemaat.tgl_baptis','Tempat/Tanggal Baptis', 'col-sm-2 control-label');
              echo $this->Form->input('tpt_baptis', array('label'=>false, 'placeholder'=>"Tempat Baptis", 'class'=>"form-control", 'div'=>array('class'=>'col-md-6')));
              echo $this->Form->input('tgl_baptis', array(
              'class' => 'form-control',
              'placeholder' => 'Tanggal Baptis',
              'div' => array('class' => 'form-inline'),
              'label' => false,
              'dateFormat' => 'DMY'
            ));
             ?>
        </div>     
        <div class="form-group">
          <?php 
              echo $this->Form->label('Jemaat.tgl_sidhi','Tempat/Tanggal Sidhi', 'col-sm-2 control-label');
              echo $this->Form->input('tpt_sidhi', array('label'=>false, 'placeholder'=>"Tempat Sidhi", 'class'=>"form-control", 'div'=>array('class'=>'col-md-6')));
              echo $this->Form->input('tgl_sidhi', array(
              'class' => 'form-control',
              'placeholder' => 'Tanggal Sidhi',
              'div' => array('class' => 'form-inline'),
              'label' => false,
              'dateFormat' => 'DMY'
            ));
             ?>
        </div>
        <div class="form-group">  
            <?php
            echo $this->Form->label('Jemaat.Minatgereja', 'Minat Gereja', 'col-md-2 control-label');
            echo $this->Form->input('Jemaat.Minatgereja', array(
                'options' => $mntgrj,
                'label'=>false,
                'div'=>'col-md-4',
                'type' => 'select',
                'multiple'=>'checkbox',
                'legend' => 'false'
              )
             ); 
             ?> 
            <?php
            echo $this->Form->label('Jemaat.Minatumum', 'Minat Umum', 'col-md-2 control-label');
            echo $this->Form->input('Jemaat.Minatumum', array(
                'options' => $mntumm,
                'label'=>false,
                'div'=>'col-md-4',
                'type' => 'select',
                'multiple'=>'checkbox',
                'legend' => 'false'
              )
             ); 
             ?>
          </div>          
         </div>
      </div>
   </div>
     <p>&nbsp;</p>
        <div class="form-group">
          <label class="col-md-2"></label>
          <div class="col-md-10">
            <button id="button1id" name="button1id" class="btn btn-success" type="submit" >Simpan</button>
            <button id="button2id" name="button2id" class="btn btn-danger">Batal</button>
          </div>
        </div>
        <?php
        echo $this->Form->end();
        ?>
</div>
</body>
</html>
