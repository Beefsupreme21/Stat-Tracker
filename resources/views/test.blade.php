<x-layout>
    <form action="/games" method="POST">
        @csrf
        <div>
            <div>
                <h3>Add a new game</h3>
                <div>
                
                <div>
                    <label for="team">Team</label>
                    <input type="text" name="team">
                </div>

                <div>
                    <label for="season">Season</label>
                    <div>
                        <input type="text" name="season">
                    </div>
                    @error('season')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div>
                    <label for="date">Date</label>
                    <div>
                        <input type="date" name="date">
                    </div>
                </div>
        
                <div>
                    <label for="location">Location</label>
                    <div>
                        <input type="text" name="location">
                    </div>
                </div>
        
                <div>
                    <label for="opponent">Opponent</label>
                    <div>
                        <input id="text" name="opponent">
                    </div>
                </div>
        
                <div>
                    <label for="weather">Weather</label>
                    <div>
                        <input type="text" name="weather" id="weather">
                    </div>
                </div>
        
                <div>
                    <label for="umpire">Umpire</label>
                    <div>
                        <input type="text" name="umpire" id="umpire">
                    </div>
                </div>
        
                <div>
                    <label for="outcome">Win/Loss</label>
                    <div>
                        <div>
                            <input type="radio" id="win" name="outcome" value="win">
                            <label for="win">Win</label>
                        </div>
                        <div>
                            <input type="radio" id="loss" name="outcome" value="lose">
                            <label for="loss">Loss</label>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
      
        <div class="pt-5">
            <div class="flex justify-end">
                <button type="button">Cancel</button>
                <button type="submit">Add Stats</button>
            </div>
        </div>
    </form>
</x-layout>