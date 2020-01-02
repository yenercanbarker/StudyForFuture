function showStudentSignUpForm() {
  document.getElementById('welcomeDivSignUp').style.display = "inline";
  document.getElementById('welcomeDivSignUpMain').style.display = "none";
  document.getElementById('teacherForm').style.display = "none";
  document.getElementById('studentForm').style.display = "inline";
}

function showTeacherSignUpForm() {
  document.getElementById('welcomeDivSignUp').style.display = "inline";
  document.getElementById('welcomeDivSignUpMain').style.display = "none";
  document.getElementById('studentForm').style.display = "none";
  document.getElementById('teacherForm').style.display = "inline";
}

function showStudentSignInForm() {
  document.getElementById('welcomeDivSignIn').style.display = "inline";
  document.getElementById('welcomeDivSignInMain').style.display = "none";
  document.getElementById('teacherForm').style.display = "none";
  document.getElementById('studentForm').style.display = "inline";
}

function showTeacherSignInForm() {
  document.getElementById('welcomeDivSignIn').style.display = "inline";
  document.getElementById('welcomeDivSignInMain').style.display = "none";
  document.getElementById('studentForm').style.display = "none";
  document.getElementById('teacherForm').style.display = "inline";
}

function showQuestionImageInput() {
  document.getElementById("soruResmi").disabled = false;
}

function hideQuestionImageInput() {
  document.getElementById("soruResmi").disabled = true;
}

var testSonuclari = new Array();
for (var i = 0; i < 9; i++)
  testSonuclari[i] = new Array(0, 0);

var soruSayaci = 1;

function soruyuCevapla() {
  var ogrenciCevabi = $("input[name=ogrenciCevabi]:checked").val();
  var soruKonusu = document.getElementById('soruKonusu' + soruSayaci).value;
  if (ogrenciCevabi == "dogru") {
    if (soruKonusu == "limit") {
      testSonuclari[0][0]++;
    } else if (soruKonusu == "turev") {
      testSonuclari[1][0]++;
    } else if (soruKonusu == "integral") {
      testSonuclari[2][0]++;
    } else if (soruKonusu == "fonksiyonlar") {
      testSonuclari[3][0]++;
    } else if (soruKonusu == "carpanlaraayirma") {
      testSonuclari[4][0]++;
    } else if (soruKonusu == "rasyonelsayilar") {
      testSonuclari[5][0]++;
    } else if (soruKonusu == "ondaliklisayilar") {
      testSonuclari[6][0]++;
    } else if (soruKonusu == "uslusayilar") {
      testSonuclari[7][0]++;
    } else if (soruKonusu == "koklusayilar") {
      testSonuclari[8][0]++;
    } else {
      alert("ERROR");
    }
  } else if (ogrenciCevabi == "yanlis") {
    if (soruKonusu == "limit") {
      testSonuclari[0][0]++;
      testSonuclari[0][1]++;
    } else if (soruKonusu == "turev") {
      testSonuclari[1][0]++;
      testSonuclari[1][1]++;
    } else if (soruKonusu == "integral") {
      testSonuclari[2][0]++;
      testSonuclari[2][1]++;
    } else if (soruKonusu == "fonksiyonlar") {
      testSonuclari[3][0]++;
      testSonuclari[3][1]++;
    } else if (soruKonusu == "carpanlaraayirma") {
      testSonuclari[4][0]++;
      testSonuclari[4][1]++;
    } else if (soruKonusu == "rasyonelsayilar") {
      testSonuclari[5][0]++;
      testSonuclari[5][1]++;
    } else if (soruKonusu == "ondaliklisayilar") {
      testSonuclari[6][0]++;
      testSonuclari[6][1]++;
    } else if (soruKonusu == "uslusayilar") {
      testSonuclari[7][0]++;
      testSonuclari[7][1]++;
    } else if (soruKonusu == "koklusayilar") {
      testSonuclari[8][0]++;
      testSonuclari[8][1]++;
    } else {
      alert("ERROR");
    }
  }
  alert(ogrenciCevabi + " as " + soruKonusu);
  soruSayaci++;
  digerSoruyuGoster(soruSayaci);
}

function digerSoruyuGoster(soruNumarasi) {
  if (document.getElementById('soruPenceresi' + soruNumarasi)) {
    document.getElementById('soruPenceresi' + (soruNumarasi - 1)).classList.remove("simdikiSoru");
    document.getElementById('soruPenceresi' + (soruNumarasi - 1)).classList.add("sonrakiSoru");
    document.getElementById('soruPenceresi' + soruNumarasi).classList.add("simdikiSoru");
  } else {
    document.getElementById('soruPenceresi' + (soruNumarasi - 1)).classList.remove("simdikiSoru");
    document.getElementById('soruPenceresi' + (soruNumarasi - 1)).classList.add("sonrakiSoru");
    document.getElementById('testiBitirButonu').style.display = "inline";
  }
}

function testiBitir() {
  $.ajax({
    url: "test_sonuclarini_kaydet.php",
    type: "post",
    data: {
      sonuc: testSonuclari
    },
    success: function (response) {
      alert(response);
    }
  });
}