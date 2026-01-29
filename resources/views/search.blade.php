@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">

        <div class="card shadow-sm">
            <div class="card-body">

                <h2 class="text-center mb-4 fw-bold">Search Bus Tickets</h2>

                <form method="GET" action="{{ route('buses.list') }}" id="searchForm">
                    <div class="row g-3">

                        <div class="col-md-4 position-relative">
                            <label class="form-label">From</label>
                            <input type="text"
                                   name="from"
                                   id="fromCity"
                                   class="form-control"
                                   placeholder="Enter City"
                                   autocomplete="off"
                                   required>
                            <div class="list-group position-absolute w-100 d-none"
                                 id="fromSuggestions"
                                 style="z-index:1000;"></div>
                        </div>

                        <div class="col-md-4 position-relative">
                            <label class="form-label">To</label>
                            <input type="text"
                                   name="to"
                                   id="toCity"
                                   class="form-control"
                                   placeholder="Enter City"
                                   autocomplete="off"
                                   required>
                            <div class="list-group position-absolute w-100 d-none"
                                 id="toSuggestions"
                                 style="z-index:1000;"></div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Journey Date</label>
                            <input type="date"
                                   name="date"
                                   class="form-control"
                                   min="{{ date('Y-m-d') }}"
                                   required>
                        </div>

                    </div>

                    <div class="text-center mt-4">
                        <button class="btn btn-primary px-5">
                            Search Buses
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

{{-- autocomplete city name --}}
<script>
function setupAutocomplete(inputId, suggestionBoxId) {
    const input = document.getElementById(inputId);
    const box = document.getElementById(suggestionBoxId);
    let isSelected = false;

    input.addEventListener('input', function () {
        const query = this.value.trim();
        isSelected = false;

        if (query.length < 2) {
            box.classList.add('d-none');
            return;
        }

        fetch(`/cities/search?q=${query}`)
            .then(res => res.json())
            .then(data => {
                box.innerHTML = '';

                if (data.length === 0) {
                    box.innerHTML = `
                        <div class="list-group-item text-danger">
                            City not found
                        </div>`;
                } else {
                    data.forEach(city => {
                        const item = document.createElement('button');
                        item.type = 'button';
                        item.className = 'list-group-item list-group-item-action';
                        item.textContent = city;

                        item.addEventListener('mousedown', function () {
                            input.value = city;
                            isSelected = true;
                            box.classList.add('d-none');
                        });

                        box.appendChild(item);
                    });
                }

                box.classList.remove('d-none');
            });
    });

    input.addEventListener('blur', function () {
        setTimeout(() => {
            if (!isSelected && input.value !== '') {
                input.value = '';
                input.classList.add('is-invalid');
            } else {
                input.classList.remove('is-invalid');
            }
            box.classList.add('d-none');
        }, 150);
    });
}

setupAutocomplete('fromCity', 'fromSuggestions');
setupAutocomplete('toCity', 'toSuggestions');
</script>

@endsection
