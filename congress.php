<html>
    <head><title>HW#6</title>
  <style>
      
      body{
        text-align: center;
      }
      #field{
        margin-left: 530px;
        margin-right: 530px;
      }
      a{
          color:blue;
      }
      #box{
        margin-left: 400px;
        margin-right: 400px;
      }
      #tab{
        width: 800px;
        text-align: center;
        border-collapse: collapse;        
      }
      img{
          text-align: center;
          margin-left: 150px;
      }     
      #main{
          vertical-align: top;
        }
      
    </style>
      <script>
        
          function func4(name,term,web,office,fb,twitter,id,title){
            document.getElementById("tab").innerHTML="";
            var name=name;
            var term=term;
            var web=web;
            var id=id
            var title=title;
            var office=office;
            var fb, twitter;
            var img="http://theunitedstates.io/images/congress/225x275/"+id+".jpg";
            
            text="";
            text +="<fieldset><table align=\"center\"><tr><td align=\"right\"><img src='"+img+"'></td></tr>";
            text +="<tr><td>Full Name</td><td>"+title+"</td></tr>";
            text +="<tr><td>Term Ends On</td><td>"+term+"</td></tr>";
            text +="<tr><td>Website</td><td><a target=\"_blank\" href='"+web+"'>"+web+"</a></td></tr>";
            text +="<tr><td>Office</td><td>"+office+"</td></tr>";
            if(fb!="NA")
            { 
                fb="http://www.facebook.com/"+fb;
                text +="<tr><td>Facebook</td><td><a target=\"_blank\" href='"+fb+"'>"+name+"</a></td></tr>";}
            else if(fb='NA')
            {   
                
                text +="<tr><td>Facebook</td><td>NA</td></tr>";}
            if(twitter!="NA")  
            {
                twitter="http://twitter.com/"+twitter;
                text +="<tr><td>Twitter</td><td><a target=\"_blank\" href='"+twitter+"'>"+name+"</a></td></tr>";}
            else
            {   twitter="";
                text +="<tr><td>Twitter</td><td>NA</td></tr>";}    
            
            
            text +="</table></fieldset>";
            document.getElementById("box").innerHTML=text;
            
            }
          
          function func3(id,title,sponser,intro,action,bill){
            document.getElementById("tab").innerHTML="";
            var id=id;
            var title=title;  
            var sponser=sponser;
            var intro=intro;
            var action=action;
            var bill=bill;  
            
            text="";
            text +="<fieldset><table align=\"right\" style=\"width:80%\"><tr><td>Bill ID</td><td>"+id+"</td></tr>";
            text +="<tr><td>Bill Title</td><td>"+title+"</td></tr>";
            text +="<tr><td>Sponser</td><td>"+sponser+"</td></tr>";
            text +="<tr><td>Introduced On</td><td>"+intro+"</td></tr>";
            text +="<tr><td>Last action with date</td><td>"+action+"</td></tr>";
            
              if(title!="NA")
            { 
                
                  text +="<tr><td>Bill URL</td><td><a target=\"_blank\" href='"+bill+"'>"+title+"</a></td></tr>";}
            else if(title='NA')
            {   
                
                  text +="<tr><td>Bill URL</td><td>"+id+"</td></tr>";
            }
              
              
              //text +="<tr><td>Bill URL</td><td><a target=\"_blank\" href='"+bill+"'>"+title+"</a></td></tr>";
                       
            text +="</table></fieldset>";
            document.getElementById("box").innerHTML=text;
            
            }
        
        </script>  
    
    </head>
    <body>
        
        <h1>Congress Information Search</h1>
        <form  method="POST" id="form1" action="<?php $_SERVER['PHP_SELF'] ?>">
        <fieldset id="field"><table id="main" align="center">
            
            <tr><td><label for="congress">Select information to query*</label></td>
            <td><select id="congress" name="congress" onchange="func()">
                <option>select your option</option>
                <option value="Legislators" <?php if(isset($_POST['congress']) && $_POST['congress'] == 'Legislators') echo 'selected="selected"';?>>Legislators</option>
                <option value="Committees" <?php if(isset($_POST['congress']) && $_POST['congress'] == 'Committees') echo 'selected="selected"'; ?>>Committees</option>
                <option value="Bills" <?php if(isset($_POST['congress']) && $_POST['congress'] == 'Bills') echo 'selected="selected"'; ?>>Bills</option>
                <option value="Amendments" <?php if(isset($_POST['congress']) && $_POST['congress'] == 'Amendments') echo 'selected="selected"';?>>Amendments</option>
            </select></td></tr>
            
            
            <tr><td align="center">Chamber</td><td><input type="radio" name="chamber" id="button1" checked="checked" value="senate" <?php if (isset($_POST[ 'chamber']) && $_POST[ 'chamber']=='senate' ){echo ' checked="checked"';}?>>Senate
            <input type="radio" name="chamber" id="button2" value="house" <?php if (isset($_POST[ 'chamber']) && $_POST[ 'chamber']=='house' ){echo ' checked="checked"';}?>>House</td></tr>
            
            
            <tr><td align="center"><label name="key2" id="key2"><?php if(isset($_POST['congress']) && $_POST['congress']=='Legislators') echo 'State/Representative*'; 
                else if(isset($_POST['congress']) && $_POST['congress']=='Committees') echo 'Committee ID*';
                else if(isset($_POST['congress']) && $_POST['congress']=='Bills') echo 'Bill ID*';
                else if(isset($_POST['congress']) && $_POST['congress']=='Amendments') echo 'Amendment ID*';
                else echo 'Keyword*';
                ?></label></td>
            <td><input type="text" id="key1" name="key" value="<?php echo isset($_POST['key'])?$_POST['key']:''?>"></td></tr>
            
                       
            <tr><td></td><td><input type="submit" name="Search" value="Search" onclick="func2()">
            <input type="button" onclick="func1()" value="Clear"></td></tr>
            
           <tr><td colspan="2" align="center"><a href=" http://sunlightfoundation.com/" target="_blank">Powered By Sunlight Foundation</a></td></tr>
              
            </table></fieldset>
      </form>
        
        <div id="box"></div>
        
<?php
   
   function state_abbr($name, $get = 'abbr') {
    
    if($get != 'name') {
    $name = strtolower($name);
    $name = ucwords($name);
    }else{
    $name = strtoupper($name);
    }
    
$states = array(
'Alabama'=>'AL',
'Alaska'=>'AK',
'Arizona'=>'AZ',
'Arkansas'=>'AR',
'California'=>'CA',
'Colorado'=>'CO',
'Connecticut'=>'CT',
'Delaware'=>'DE',
'Florida'=>'FL',
'Georgia'=>'GA',
'Hawaii'=>'HI',
'Idaho'=>'ID',
'Illinois'=>'IL',
'Indiana'=>'IN',
'Iowa'=>'IA',
'Kansas'=>'KS',
'Kentucky'=>'KY',
'Louisiana'=>'LA',
'Maine'=>'ME',
'Maryland'=>'MD',
'Massachusetts'=>'MA',
'Michigan'=>'MI',
'Minnesota'=>'MN',
'Mississippi'=>'MS',
'Missouri'=>'MO',
'Montana'=>'MT',
'Nebraska'=>'NE',
'Nevada'=>'NV',
'New Hampshire'=>'NH',
'New Jersey'=>'NJ',
'New Mexico'=>'NM',
'New York'=>'NY',
'North Carolina'=>'NC',
'North Dakota'=>'ND',
'Ohio'=>'OH',
'Oklahoma'=>'OK',
'Oregon'=>'OR',
'Pennsylvania'=>'PA',
'Rhode Island'=>'RI',
'South Carolina'=>'SC',
'South Dakota'=>'SD',
'Tennessee'=>'TN',
'Texas'=>'TX',
'Utah'=>'UT',
'Vermont'=>'VT',
'Virginia'=>'VA',
'Washington'=>'WA',
'West Virginia'=>'WV',
'Wisconsin'=>'WI',
'Wyoming'=>'WY'
);
    if($get == 'name') {
    $states = array_flip($states);
    }
    if(!isset($states[$name])) return null;
    else return $states[$name];
    
}
   
               
    function func2(){
    
    $b= $_POST['congress']; 
    $c= isset($_POST['chamber'])?$_POST['chamber']:'';
    $d= $_POST['key'];
    $state_a="";
    $state_a=$d;    
    $state_a=trim($d);
    if(strcmp($_POST["congress"],"Legislators") == 0){
    
    
    if(state_abbr($state_a))
    {
        $state_a = state_abbr($state_a);
        $url = "http://congress.api.sunlightfoundation.com/legislators?chamber=".$c."&state=".$state_a."&apikey=07daebe9dade4bc784ababb5c5f81b03";
        $json=file_get_contents($url,0,null,null);
        $json_response=json_decode($json,true);
    }
    else
    {
        $state_a = strtolower($state_a);
        $state_a = ucwords($state_a);
        $state_a = explode(" ", $state_a,7);
        //print_r($state_a);
        //echo $state_a[0];
        //echo $state_a[1];
        if($state_a[0] && isset($state_a[1])){
            //echo $state_a[1];
            $url="http://congress.api.sunlightfoundation.com/legislators?chamber=".$c."&first_name=".$state_a[0]."&last_name=".$state_a[1]."&apikey=07daebe9dade4bc784ababb5c5f81b03";
        }
        else if($state_a[0]){
            $url="http://congress.api.sunlightfoundation.com/legislators?chamber=".$c."&query=".$state_a[0]."&apikey=07daebe9dade4bc784ababb5c5f81b03";  
        }
        
        
        //print_r($state_b);
        //$url="http://congress.api.sunlightfoundation.com/legislators?chamber=".$c."&query=".$state_a."&apikey=07daebe9dade4bc784ababb5c5f81b03";
        $json=file_get_contents($url,0,null,null);
        $json_response=json_decode($json,true);
    }
    
    $obj= (array)$json_response;
    
        if ($obj['count']==0)
        {
            echo '<html><body><h3 id="head">The API returned zero result for the request</h3></body></html>';
        }
    
        else    
        {
            
        echo '<html><body><table align="center" id="tab" border><tr><th>Name</th><th>State</th><th>Chamber</th><th>Details</th></tr>';
        $details= "";
        for($i=0; $i<count($json_response['results']); $i++)
        {
        $name=$json_response['results'][$i]["first_name"]." ".$json_response['results'][$i]["last_name"];
        $state=$json_response['results'][$i]["state_name"];
        $chamber=$json_response['results'][$i]["chamber"];
        $details=$json_response['results'][$i]["bioguide_id"];
        $term=$json_response['results'][$i]["term_end"];
        if($json_response['results'][$i]["website"]) $web=$json_response['results'][$i]["website"]; else $web='NA';
        $office=$json_response['results'][$i]["office"];
        
        if(isset($json_response['results'][$i]["facebook_id"])) {
            //if(($json_response['results'][$i]["facebook_id"])=='undefined'){
            $fb=$json_response['results'][$i]["facebook_id"];}
            else {$fb='NA';}
        
            
        if(isset($json_response['results'][$i]["twitter_id"])){
            //if(($json_response['results'][$i]["twitter_id"])=='undefined'){
            $twitter=$json_response['results'][$i]["twitter_id"];}
            else {$twitter='NA';}
            
        
        $title=$json_response['results'][$i]["title"]." ".$name;    
        ?>
        <tr><td align="left"><?php echo $name ?></td><td><?php echo $state ?></td><td><?php echo $chamber ?></td><td><a href="#" onclick="func4('<?php echo $name?>','<?php echo $term;?>','<?php echo $web; ?>','<?php echo $office; ?>','<?php echo $fb; ?>','<?php echo $twitter; ?>','<?php echo $details; ?>','<?php echo $title; ?>')">View Detail</a></td></tr>
        
        <?php }  
    echo '</table></body></html>';
    }
    }
    
        
    if(strcmp($_POST["congress"],"Committees") == 0)
    {
    $d = strtolower($d);
    $d = ucwords($d);
    $d = strtoupper($d);    
    $url = "http://congress.api.sunlightfoundation.com/committees?committee_id=".$d."&chamber=".$c."&apikey=07daebe9dade4bc784ababb5c5f81b03";
    $json=file_get_contents($url,0,null,null);
    $json_response=json_decode($json,true);
    //print_r($json_respons);
    $obj= (array)$json_response;
    if ($obj['count']==0){
    echo '<html><body><h3 id="head">The API returned zero result for the request</h3></body></html>';
    }
    else    
    {    
    echo '<html><body><table align="center" id="tab" border><tr><th>Committee ID</th><th>Committee Name</th><th>Chamber</th></tr>';
    $details= "";
    for($i=0; $i<count($json_response['results']); $i++)
        {
        $comm_id=$json_response['results'][$i]["committee_id"];
        $comm_name=$json_response['results'][$i]["name"];
        $chamber=$json_response['results'][$i]["chamber"];
    echo '<tr><td>'.$comm_id.'</td><td>'.$comm_name.'</td><td>'.$chamber.'</td></tr>';
        }  
    echo '</table></body></html>';
    }
    }
    
    if(strcmp($_POST["congress"],"Bills") == 0)
    {
    $d = strtoupper($d);  
    $d = strtolower($d);    
    $url = "http://congress.api.sunlightfoundation.com/bills?bill_id=".$d."&chamber=".$c."&apikey=07daebe9dade4bc784ababb5c5f81b03";
    $json=file_get_contents($url,0,null,null);
    $json_response=json_decode($json,true);
    $obj= (array)$json_response;
    if ($obj['count']==0){
    echo '<html><body><h3 id="head">The API returned zero result for the request</h3></body></html>';
    }
    else    
    {
    echo '<html><body><table align="center" id="tab" border><tr><th>Bill ID</th><th>Short Title</th><th>Chamber</th><th>Details</th></tr>';
    
    for($i=0; $i<count($json_response['results']); $i++)
        {
        $bill_id=$json_response['results'][$i]["bill_id"];
        if($json_response['results'][$i]["short_title"]) $title=$json_response['results'][$i]["short_title"]; else $title='NA';
        
        $chamber=$json_response['results'][$i]["chamber"];
        $sponser=$json_response['results'][$i]['sponsor']['title']." ".$json_response['results'][$i]['sponsor']['first_name']." ".$json_response['results'][$i]['sponsor']['last_name'];
    
        $intro=$json_response['results'][$i]["introduced_on"];
        $action=$json_response['results'][$i]['last_version']['version_name']." ".$json_response['results'][$i]["last_action_at"];
        
        //if($json_response['results'][$i]['last_version']['urls']['pdf']) $bill=$json_response['results'][$i]['last_version']['urls']['pdf']; else $bill='NA';
        $bill=$json_response['results'][$i]['last_version']['urls']['pdf'];
    ?>    
    
        
    <tr><td><?php echo $bill_id ?></td><td><?php echo $title ?></td><td><?php echo $chamber ?></td><td><a href="#" onclick="func3('<?php echo $bill_id?>','<?php echo $title;?>','<?php echo $sponser; ?>','<?php echo $intro; ?>','<?php echo $action; ?>','<?php echo $bill; ?>')">View Detail</a></td></tr>    
    
        
    <?php
        }  
    echo '</table></body></html>';
    }
    }

    if(strcmp($_POST["congress"],"Amendments") == 0)
    {
    $d = strtoupper($d);  
    $d = strtolower($d);   
    $url = "http://congress.api.sunlightfoundation.com/amendments?amendment_id=".$d."&chamber=".$c."&apikey=07daebe9dade4bc784ababb5c5f81b03";
    $json=file_get_contents($url,0,null,null);
    $json_response=json_decode($json,true);
    //print_r($json_response);
    $obj= (array)$json_response;
    if ($obj['count']==0){
    echo '<html><body><h3 id="head">The API returned zero result for the request</h3></body></html>';
    }
    else    
    {
    echo '<html><body><table align="center" text-align="center" id="tab" border><tr><th>Amendment ID</th><th>Amendment Type</th><th>Chamber</th><th>Introduced on</th></tr>';
    $details= "";
    for($i=0; $i<count($json_response['results']); $i++)
        {
        $amen_id=$json_response['results'][$i]["amendment_id"];
        $amen_type=$json_response['results'][$i]["amendment_type"];
        $chamber=$json_response['results'][$i]["chamber"];
        $intro=$json_response['results'][$i]["introduced_on"];
    echo '<tr><td>'.$amen_id.'</td><td>'.$amen_type.'</td><td>'.$chamber.'</td><td>'.$intro.'</td></tr>';
        }  
    echo '</table></body></html>';
    }
    }
    
} 

    if (isset($_POST["Search"])){   
    
    
        
    $b=$c=$d=$err="";
    $b= $_POST['congress']; 
    $c= isset($_POST['chamber'])?$_POST['chamber']:'';
    $d= $_POST['key'];
        
        if($b=="select your option"){
            $err="Congress Database,";
        }
        if($c==""){
            $err.=" Chamber,";
        }
        if($d==""){
             if(isset($_POST['congress']) && $_POST['congress']=='Legislators')  $err.=' State/Representative.'; 
                else if(isset($_POST['congress']) && $_POST['congress']=='Committees')  $err.=' Committee ID.';
                else if(isset($_POST['congress']) && $_POST['congress']=='Bills')  $err.=' Bill ID.';
                else if(isset($_POST['congress']) && $_POST['congress']=='Amendments')  $err.=' Amendment ID.';
                else  $err.=' Keyword.'; ;
        }
        if($err){
        $msg="Please fill the following fields:";
            ?>
        <script type='text/javascript'>alert('<?php echo $msg.$err; ?>'); </script>
        <?php    
        }
       
        else
        {
            func2();
        }
    }
        ?>
        
<script type="text/javascript">
    
    function func(){
        var x= document.getElementById("congress").value;
        var y= document.getElementById("key2");
        if(document.getElementById("key1")) document.getElementById("key1").value = "";
        if(x=="Legislators"){y.innerHTML="State/Representative*"; }
        else if(x=="Committees"){y.innerHTML="Committee ID*";}
        else if(x=="Bills"){y.innerHTML="Bill ID*";}
        else if(x=="Amendments"){y.innerHTML="Amendment ID*";}
        else y.innerHTML="Keyword*";
        
    }
        
    function func1(){
        
        document.getElementById("congress").value="select your option";
        if(document.getElementById("button1")) document.getElementById("button1").checked=true;
        if(document.getElementById("button2")) document.getElementById("button2").checked=false;
        if(document.getElementById("key1")) document.getElementById("key1").value = "";
        if(document.getElementById("key2")) document.getElementById("key2").innerHTML = "Keyword*";
        if(document.getElementById("tab")) document.getElementById("tab").innerHTML="";
        if(document.getElementById("head")) document.getElementById("head").innerHTML="";
        if(document.getElementById("box")) document.getElementById("box").innerHTML="";
        
        }

        </script>
    
 
   </body>
</html>