@extends('layouts.be_main')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Products Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Products</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        {{-- flash --}}
        {{-- @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif --}}

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex justify-content-between py-2">
                                Category List
                                <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm">Create</a>
                            </div>

                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item)
                                        <tr>
                                            {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                                            <th scope="row">
                                                {{ $products->firstItem() + $loop->index }}
                                            </th>
                                            <td>
                                                <img src="{{ asset('storage/assets/images/' . $item->image) }}"
                                                    width="50">
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>Rp. {{ number_format($item->price, 2, ',', '.') }}</td>
                                            <td>
                                                <form action="{{ route('product.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('product.edit', $item->id) }}"
                                                        class="btn btn-warning btn-sm bi bi-pencil"></a>
                                                    <a href="{{ route('product.show', $item->id) }}"
                                                        class="btn btn-info btn-sm bi bi-eye"></a>
                                                    <button type="submit"
                                                        class="deleteData btn btn-danger btn-sm bi bi-trash"></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                            {{-- pagination --}}
                            {{ $products->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: true,
                timer: 1500
            });
        @endif

        // delete data
        document.querySelectorAll('.deleteData').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });

                        // submit
                        e.target.parentElement.submit();
                    }
                });
            });
        });
    </script>
@endpush
