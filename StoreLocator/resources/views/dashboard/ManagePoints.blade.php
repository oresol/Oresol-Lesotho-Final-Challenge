@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card border border-light">
            <div class="card-header bg-light text-primary">
                Manage Points
            </div>
            <div class="card-body">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <h5 class="card-title mb-3">Add Store</h5>
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <form>
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">Store Name</label>
                                                <input type="text" id="form6Example1" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example2">Address</label>
                                                <input type="text" id="form6Example2" class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">Phone</label>
                                                <input type="text" id="form6Example1" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example2">Longitude</label>
                                                <input type="text" id="form6Example2" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">Latitude</label>
                                                <input type="text" id="form6Example1" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example2">Store Type</label>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Select Store Type</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example2">Company</label>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Select Company</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label for="formFile" class="form-label">Company Photo</label>
                                                <input class="form-control" type="file" id="formFile">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block mb-4">Place order</button>
                                </form>
                            </div>
                        </div>
                        @include('components.Stores')
                    </div>
                </div>
            </div>
        </div>
    @endsection
