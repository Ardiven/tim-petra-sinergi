<?php 
include"header.php";
?>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
function checkWordCount(){
	console.log("masuk");
    s1 = document.getElementById("no1").value;
    s2 = document.getElementById("no2").value;
    s3 = document.getElementById("no3").value;
    s4 = document.getElementById("no4").value;
    s5 = document.getElementById("no5").value;
    s6 = document.getElementById("no6").value;
    s7 = document.getElementById("no7").value;
    s8 = document.getElementById("no8").value;
    s1 = s1.replace(/(^\s*)|(\s*$)/gi,"");
    s1 = s1.replace(/[ ]{2,}/gi," ");
    s1 = s1.replace(/\n /,"\n");
    if (s1.split(' ').length <= 20) {
        alert("not enough words...");
return false;
    }

    s2 = s2.replace(/(^\s*)|(\s*$)/gi,"");
    s2 = s2.replace(/[ ]{2,}/gi," ");
    s2 = s2.replace(/\n /,"\n");
    if (s2.split(' ').length <= 20) {
        alert("not enough words...");
return false;
    }
    s3 = s3.replace(/(^\s*)|(\s*$)/gi,"");
    s3 = s3.replace(/[ ]{2,}/gi," ");
    s3 = s3.replace(/\n /,"\n");
    if (s3.split(' ').length <= 20) {
        alert("not enough words...");
return false;
    }
    s8 = s8.replace(/(^\s*)|(\s*$)/gi,"");
    s8 = s8.replace(/[ ]{2,}/gi," ");
    s8 = s8.replace(/\n /,"\n");
    if (s8.split(' ').length <= 20) {
        alert("not enough words...");
return false;
    }
    s4 = s4.replace(/(^\s*)|(\s*$)/gi,"");
    s4 = s4.replace(/[ ]{2,}/gi," ");
    s4 = s4.replace(/\n /,"\n");
    if (s4.split(' ').length <= 20) {
        alert("not enough words...");
return false;
    }
    s7 = s7.replace(/(^\s*)|(\s*$)/gi,"");
    s7 = s7.replace(/[ ]{2,}/gi," ");
    s7 = s7.replace(/\n /,"\n");
    if (s7.split(' ').length <= 20) {
        alert("not enough words...");
return false;
    }
    s6 = s6.replace(/(^\s*)|(\s*$)/gi,"");
    s6 = s6.replace(/[ ]{2,}/gi," ");
    s6 = s6.replace(/\n /,"\n");
    if (s6.split(' ').length <= 20) {
        alert("not enough words...");
return false;
    }
    s5 = s5.replace(/(^\s*)|(\s*$)/gi,"");
    s5 = s5.replace(/[ ]{2,}/gi," ");
    s5 = s5.replace(/\n /,"\n");
    if (s5.split(' ').length <= 20) {
        alert("not enough words...");
return false;
    }


}
</script>
<div class="container">
<h2>Survey Mentor</h2>
<div class="form-group">
<form method="post" action="#">
<label>Jelaskan apakah KTB sudah membantu anda selama proses Ethic Enrichment?(sebutkan)</label>
<!-- <input type="text" name="no1" id="no1" class="form-control"> -->
<input type="text" name="no1" id="no1" class="form-control">
<br>
<label>Jelaskan apakah mentor anda available untuk anda?(sering berKTB,fast respon,ada disaat dibutuhkan)</label>
<input type="text" name="no2" id="no2" class="form-control">
<br>
<label>Jelaskan apakah Kelompok KTB anda sudah efektif?(Materi oke,sharing oke,fellowship juga oke)</label>
<input type="text" name="no3" id="no3" class="form-control">
<br>
<label>Jelaskan apakah relasi di dalam kelompok KTB anda sudah bertumbuh?(Saling terbuka satu sama lain,percaya satu sama lain)</label>
<input type="text" name="no4" id="no4" class="form-control">
<br>
<label>Jelasakan apakah kelompok KTB anda berdampak bagi anda?(sebutkan dampaknya)</label>
<input type="text" name="no5" id="no5" class="form-control">
</formbr>
<label>Jelaskan apakah mentor anda sudah emmahami materi KTB?(Mampu menjawab pertanyaan seputar materi KTB,persoalan,realita,dan doktrin seputar KTB)</label>
<input type="text" name="no6" id="no6" class="form-control">
<label>Jelaskan apakah mentor anda sudah menginspirasi anda?(Membawa dampak & menjadi teladan untuk anda)</label>
<input type="text" name="no7" id="no7" class="form-control">
<label>Harapan untuk mentor anda saat ini(Kritik & saran)</label>
<input type="text" name="kritik" id="kritik" class="form-control">
<input type="button" id="submit" name="submit_survey" class="btn btn-default" onclick="checkWordCount()">
</form>
</div>


</div>

