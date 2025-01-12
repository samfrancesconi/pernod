<div
    id="age-gate"
    class="fixed inset-0 z-50 bg-lightGreen"
>
    <div class="flex justify-center items-center w-screen h-screen text-green">
        <div class="w-96 max-w-full px-4 flex flex-col text-center">
            
            <h3 class="text-2xl font-bold mb-4">
                BENVENUT*<br/>
            </h3>
            
            <p>
                Per accedere a questo sito devi aver compiuto 18 anni.<br/>
                Inserisci il tuo anno di nascita
            </p>

            <input
                id="age-input"
                type="text"
                placeholder="AAAA"
                class="text-center border-bottom-1 outline-green my-4 py-2 px-4 text-2xl rounded-lg"
            />

            <p class="text-red mb-4 hidden" id="too-young">
                Sei troppo giovane per entrare
            </p>

            <p class="mt-8">
                Devi aver compiuto 18 anni per entrare in questo sito
            </p>

            <div class="flex justify-center space-x-2 mt-4">
                <input type="checkbox" name="remember-age" id="remember-age" checked> 
                <label for="remember-age" class="cursor-pointer">
                    Ricordami
                </label>
            </div>
        </div>
    </div>
</div>