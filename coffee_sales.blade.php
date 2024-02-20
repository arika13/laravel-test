<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New ☕️ Sales') }}
        </h2>
    </x-slot>
<style>
    /* Apply margin to the table */
    table {
        margin: 20px;
        border-collapse: collapse;
        width: 60%;

    }

    /* Apply spacing between table cells */
    table, th, td {
        border: 1px solid black;
        padding: 8px;
    }

    /* Style for table header */
    th {
        background-color: #f2f2f2;
    }

    /* Apply additional margin and spacing if needed */
    .additional-margin {
        margin: 10px;
    }

    .additional-spacing {
        padding: 15px;
    }
    
    
/* CSS to make input fields block-level */
.form-inputs label {
    display: block;
    margin-bottom: 15px; /* Optional: Add margin between label and input field */
}

.form-inputs input[type="number"] {
    display: block;
    width: 100%; /* Optional: Adjust width of input field */
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    margin-bottom: 10px; /* Optional: Add margin between input fields */
}



        


        
        /* Selling Price field */
        .selling-price {
            display: inline-block;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        /* Form submit button */
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    
</style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <!-- @todo -->
                   <!-- resources/views/calculate-selling-price.blade.php -->

                    <form method="POST" action="{{ route('coffee.sales') }}">
                        @csrf

                     
                    <div class="form-row">
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" min="1" required>
                    
                        <label for="unit_cost">Unit Cost:</label>
                        <input type="number" id="unit_cost" name="unit_cost"  min="10.00" required>
                    <button type="submit">Record Sale</button>

                     @isset($sellingPrice)
                        <p>Selling Price: £{{ number_format($sellingPrice->unit_cost, 2) }} </p>
                        @endisset
                    </div>
                    </form>

                   
                       
       
                <!-- Previous Sales Data Section -->
                <br /><br />
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Previous Sales</h2>


                <table>
                    <thead>
                        <tr>
                            <th>Quantity</th>
                            <th>Unit Cost</th>
                            <th>Selling Price</th>
                            <!--<th>Date</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($previousSales as $sale)
                            <tr>
                                <td>{{ $sale->quantity }}</td>
                                <td>£{{ $sale->unit_cost }}</td>
                                <td>£{{ $sale->selling_price }}</td>
                                <!--<td>{{ $sale->created_at }}</td>-->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
