<section class="search container-fluid">
      <form method="get" action="/search" class="rounded-5 container">
        @csrf
        <div class="search-header">
          <img src="{{asset('img/magnifier.svg')}}" alt="" />
          <h4 class="fw-bold">Бързо Търсене</h4>
        </div>
        <div class="row justify-content-between my-3">
          <input name="q" class="col rounded-5" type="text" placeholder="Търсене..." />
          <a href="#" class="filter col">
            <span class="icon"></span>
          </a>
          <button class="btn col-3 rounded-5" type="submit">Търсене</button>
        </div>
        <div class="search-checkboxes">
          <input
            type="radio"
            class="btn-check"
            id="option1"
            autocomplete="off"
            checked
          />
          <label class="btn" for="option1">Всичко</label>
          <input
            type="radio"
            class="btn-check"
            id="option2"
            autocomplete="off"
          />
          <label class="btn" for="option2">Авточасти</label>
          <input
            type="radio"
            class="btn-check"
            id="option3"
            autocomplete="off"
          />
          <label class="btn" for="option3">Борса Части</label>
          <input
            type="radio"
            class="btn-check"
            id="option4"
            autocomplete="off"
          />
          <label class="btn" for="option4">Автоборса</label>
          <input
            type="radio"
            class="btn-check"
            id="option5"
            autocomplete="off"
          />
          <label class="btn" for="option5">Продава Коли</label>
          <input
            type="radio"
            class="btn-check"
            id="option6"
            autocomplete="off"
          />
          <label class="btn" for="option6">Продава Части</label>
        </div>
      </form>
    </section>