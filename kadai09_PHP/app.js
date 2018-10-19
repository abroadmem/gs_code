var recognition = new webkitSpeechRecognition();
recognition.lang = "ja-JP";
//中間結果の表示オン
recognition.interimResults = true;

recognition.onresult = function(event){
    var results = event.results;
    for (var i = event.resultIndex; i<results.length; i++){
        //認識の最終結果
        if(results[i].isFinal){
            $("#recognizedText").text(results[i][0].transcript);
        }
        //認識の中間結果
        else{
            $("#recognizedText").text(results[i][0].transcript);
        }
    }
};