<!-- This is the Model for the Shopping Cart Tutorial, it connects with the table 'Products' in the 'Ross-Test' database.
The tutorial can be found here:- https://code.tutsplus.com/articles/how-to-build-a-shopping-cart-using-codeigniter-and-jquery--net-8187 -->

<?php
    class Cart_Model extends CI_Model{
        function retrieve_products(){
            $query = $this->db->get('products'); // Select the table products
            return $query->result_array(); // Return the results in a array.
        }

        // Add an item to the cart
        function validate_add_cart_item(){

            $id = $this->input->post('product_id'); // Assign posted product_id to $id
            $cty = $this->input->post('quantity'); // Assign posted quantity to $cty

            $this->db->where('id', $id); // Select where id matches the posted id
            $query = $this->db->get('products', 1); // Select the products where a match is found and limit the query by 1

            // Check if a row has matched our product id
            if($query->num_rows > 0){

            // We have a match!
                foreach ($query->result() as $row)
                {
                    // Create an array with product information
                    $data = array(
                        'id'      => $id,
                        'qty'     => $cty,
                        'price'   => $row->price,
                        'name'    => $row->name
                    );

                    // Add the data to the cart using the insert function that is available because we loaded the cart library
                    $this->cart->insert($data);

                    return TRUE; // Finally return TRUE
                }

            }else{
                // Nothing found! Return FALSE!
                return FALSE;
            }
        }

        // Updated the shopping cart
        function validate_update_cart(){

            // Get the total number of items in cart
            $total = $this->cart->total_items();

            // Retrieve the posted information
            $item = $this->input->post('rowid');
            $qty = $this->input->post('qty');

            // Cycle true all items and update them
            for($i=0;$i < $total;$i++)
            {
                // Create an array with the products rowid's and quantities.
                $data = array(
                   'rowid' => $item[$i],
                   'qty'   => $qty[$i]
                );

                // Update the cart with the new information
                $this->cart->update($data);
            }

        }
    }