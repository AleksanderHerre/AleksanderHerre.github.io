        // Initialize counts from local storage or default to 0
        var tailsCount = parseInt(localStorage.getItem('tailsCount')) || 0;
        var headsCount = parseInt(localStorage.getItem('headsCount')) || 0;

        function handleCoinClick() {
            // Reset the previous result
            document.getElementById('result_coin').textContent = 'It is';

            var flipResult = Math.random();
            var coinElement = document.getElementById('coin');

            coinElement.classList.remove('heads', 'tails');
            coinElement.classList.add('spinning');

            setTimeout(function () {
                if (flipResult <= 0.5) {
                    coinElement.classList.add('heads');
                    document.getElementById('result_coin').textContent = 'It is heads';
                    headsCount++;
                    console.log('It is head');
                } else {
                    coinElement.classList.add('tails');
                    document.getElementById('result_coin').textContent = 'It is tails';
                    tailsCount++;
                    console.log('It is tails');
                }

                // Update and display counts
                localStorage.setItem('tailsCount', tailsCount);
                localStorage.setItem('headsCount', headsCount);
                document.getElementById('tails_result').textContent = 'Tails: ' + tailsCount;
                document.getElementById('heads_result').textContent = 'Heads: ' + headsCount;

                // Remove the spinning class after the animation is complete
                setTimeout(function () {
                    coinElement.classList.remove('spinning');
                }, 100);
            }, 100);
        }