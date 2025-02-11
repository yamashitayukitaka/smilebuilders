//素のjavascriptのみを使用する場合は、(function($){ })(jQuery);で囲むとエラーが出るので囲まない
//下記のyoutubeを制御するコードはyoutube iframeが読み込まれたあとに実行させないと制御できないので、footerで読み込ませる



window.addEventListener('DOMContentLoaded', function() {
    const youtubeIframe = document.getElementById('youtube_player');
    if (youtubeIframe) {
        const tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        const firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    }
}, false);

function onYouTubeIframeAPIReady() {
    const ytPlayer = new YT.Player('youtube_player', {
        events: {
            'onReady': onPlayerReady
        }
    });
}

function onPlayerReady(event) {
    switchVideo(event.target);
    window.addEventListener('scroll', function() {
        switchVideo(event.target);
    }, false);
}

function switchVideo(targetPlayer) {
    const playerPosition = targetPlayer.getIframe().getBoundingClientRect().top + window.pageYOffset;
    const startPosition = window.pageYOffset + window.innerHeight;
    const endPosition = window.pageYOffset - 500; /*動画停止位置を500px下へ移動*/
    
    console.log('スクロール位置:', window.pageYOffset);
    console.log('プレイヤー位置:', playerPosition);
    console.log('開始位置:', startPosition);
    console.log('終了位置:', endPosition);
    
    if ((playerPosition < startPosition) && (playerPosition > endPosition)) {
        targetPlayer.mute();
        targetPlayer.playVideo();
    } else {
        targetPlayer.pauseVideo();
        targetPlayer.seekTo(0); /*スタートに戻す */
    }
}

