<?php

class Testing4 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        //$this->load->library('form_validation');
        $this->load->library('unit_test');
        // $this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        //template
        $str = '
            <table border="0" cellpadding="4" cellspacing="1">
            {rows}
                    <tr>
                            <td>{item}</td>
                            <td>{result}</td>
                    </tr>
            {/rows}
            </table>';
        //$this->unit->set_template($str);
        $true = true;
        $expected = true;
        $test_name = 'uji coba assert';

        //test url
        //$output = $this->request('GET',['Login','test']);
        $expect = '{"foo":"bar"}';

        //$this->unit->run($output,$expect,$test_name);
        $this->unit->run($true,$expected,$test_name);

        
        $test_name = 'tes ifelse_1';
        $this->unit->run($this->ifelse(null,'carl'),'carl',$test_name);

        $test_name = 'tes ifelse_2';
        $this->unit->run($this->ifelse('yung',null),'yung',$test_name);

        $test_name = 'tes ifelse_3';
        $this->unit->run($this->ifelse(null,null),"Something wrong. Please contact US",$test_name);

        $test_name = 'tes ifelse_4';
        $this->unit->run($this->ifelse('yung','carl'),'yung',$test_name);

        $test_name = 'tes ifelse2_1';
        $this->unit->run($this->ifelse2(null),'dia bukan teman saya',$test_name);

        $test_name = 'tes ifelse2_2';
        $this->unit->run($this->ifelse2('andi'),"dia adalah teman saya",$test_name);

        $test_name = 'tes ifelse2_3';
        $this->unit->run($this->ifelse2('john'),"dia bukan teman saya",$test_name);

        $test_name = 'tes ifelse3_1';
        $this->unit->run($this->ifelse3('sapi','kambing','kuda'),'sapi',$test_name);

        $test_name = 'tes ifelse3_2';
        $this->unit->run($this->ifelse3('sapi','kambing',null),'sapi',$test_name);

        $test_name = 'tes ifelse3_3';
        $this->unit->run($this->ifelse3('sapi',null,null),'sapi',$test_name);

        $test_name = 'tes ifelse3_4';
        $this->unit->run($this->ifelse3(null,'kambing','kuda'),'kambing',$test_name);

        $test_name = 'tes ifelse3_5';
        $this->unit->run($this->ifelse3(null,'kambing',null),'kambing',$test_name);

        $test_name = 'tes ifelse3_6';
        $this->unit->run($this->ifelse3(null,null,'kuda'),'kuda',$test_name);

        $test_name = 'tes ifelse3_7';
        $this->unit->run($this->ifelse3('sapi',null,'kuda'),'sapi',$test_name);

        $test_name = 'tes ifelse3_8';
        $this->unit->run($this->ifelse3(null,null,null),"Something wrong. Please contact US",$test_name);

        $test_name = 'tes ifelse4_1';
        $this->unit->run($this->ifelse4('d'),'',$test_name);

        $test_name = 'tes ifelse4_2';
        $this->unit->run($this->ifelse4(null),'',$test_name);

        $test_name = 'tes loop1_1';
        $this->unit->run($this->loop1(1),2048,$test_name);

        $test_name = 'tes loop1_2';
        $this->unit->run($this->loop1(null),null,$test_name);

        $test_name = 'tes loop2_1';
        $arr = array(0,1,2,3,4);
        $this->unit->run($this->loop2($arr),4,$test_name);

        $test_name = 'tes loop2_2';
        $this->unit->run($this->loop2($null),0,$test_name);

        $test_name = 'tes loop3_1';
        $this->unit->run($this->loop3(null),null,$test_name);

        $test_name = 'tes loop3_2';
        $this->unit->run($this->loop3(null),null,$test_name);

        echo $this->unit->report();
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('admin/login'));
    }

    public function test()
    {
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('foo' => 'bar')));
    }

    //minggu 3
    public function ifelse($namachief = null,$namarm = null){
        $tmp = '';
        if($namachief != NULL){
            $tmp = $namachief;
        }
        else if ($namarm != NULL){
           $tmp = $namarm;
        }
        else{
            $tmp = "Something wrong. Please contact US";
        }
        return $tmp;
    }

    public function ifelse2($teman){
        $tmp = '';
        if($teman == "andi"){
            $tmp = "dia adalah teman saya";
        }else{
            $tmp = "dia bukan teman saya";
        }
        return $tmp;
    }

    public function ifelse3($namachief = null, $namarm = null, $namamhs){
        $tmp = '';
        if($namachief != NULL){
            $tmp = $namachief;
        }
        else if ($namarm != NULL){
            $tmp = $namarm;
        }
        else if ($namamhs != NULL){
            $tmp = $namamhs;
         }
        else{
            $tmp = "Something wrong. Please contact US";
        }
        return $tmp;
    }

    public function ifelse4($inputtgl = 'D'){
        $tmp = '';
        $d = date($inputtgl);
        if($d == "Fri"){
            $tmp = "Have a nice weekend!";
        }elseif($d == "Sun"){
            $tmp = "Have a nice weekend!";
        }elseif($d == "Mon"){
            $tmp = "Have a nice Monday!";
        }elseif($d == "Tue"){
            $tmp = "Have a nice Tuesday!";
        }elseif($d == "Wed"){
            $tmp = "Have a nice Wednesday!";
        }elseif($d == "Thu"){
            $tmp = "Have a nice Thursday!";
        }elseif($d == "Sat"){
            $tmp = "Have a nice Weekend!";
        }
        return $tmp;
    }

    public function loop1($var){
        for ($i=0; $i <= 10; $i++) { 
            $var+=$var;
        }
        return $var;
    }

    public function loop2($arr){
        $result = '';
        foreach ($arr as $key => $value) {
            if($key % 2 == 1){
                $value+=$value;
            }
            $result = $value;
        }
        return $result;
    }

    public function loop3($var){
        $a=0;
        while ($a <= 10) {
            $var += $var;
            $a++;
        }
        return $var;
    }
}
