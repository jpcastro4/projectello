<?php

require_once(APPPATH.'libraries/REST_Controller.php');

class Index extends REST_Controller{

    public function index_get(){

    	// if(!$this->get('id') ){

    	//  	$this->response( [
        //             'status' => FALSE,
        //             'message' => 'Insert id bank to return item'
        //         ], 404);
    	// }

    	// $userId = $this->get('id');

    	// $this->db->where('id',$userId);
    	// $user = $this->db->get('usuarios')->row();

    	// $this->db->where('id_usuario',$userId);
    	// $niveis = $this->db->get('usuarios_nivel')->row();

    	// $result = $user + $nives;

        // $this->response($result, 200);

    }

     public function empresas_get(){

        if($this->input->get('empresaId')){

            // echo json_encode($this->input->get('empresaId'));
            // return;
  
            $this->db->where('empresaId',$this->input->get('empresaId'));
            $result = $this->db->get('empresas');

            if($result->num_rows() > 0 ){

                $itens = $result->row();

                unset($itens->empresaPass);
                                
                $this->response($itens , 200);

            }else{

                $this->response( [
                    'status' => FALSE,
                    'message' => 'Empresa inexistente'
                ], 304);
            }

        }else{

            $this->response( [
                'status' => FALSE,
                'message' => 'Especifique a empresa'
            ], 400);

        }
    }

    public function empresas_post(){

        if($this->input->post('empresaId')){

            if(!$this->input->post('empresaNome') ){
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Nome obrigatório'
                ], 400);
            }

            
            $updateData = array(
                'empresaNome'=>$this->input->post('empresaNome'),
                'empresaCnpj'=>$this->input->post('empresaCnpj') 
            );

            if(!empty($this->input->post('empresaPass'))){
                $updateData['empresaPass'] = $this->input->post('empresaPass');
            }

            $this->db->where('empresaId',$this->input->post('empresaId'));
            $update = $this->db->update('empresas', $updateData);

            if($update){
                $this->response( [
                    'status' => TRUE,
                    'message' => 'Empresa alterada'
                ], 200);
            }else{
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Erro na alteração'
                ], 304);
            }

        }else{

            if(!$this->input->post('empresaNome') ){
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Especifique ao menos o nome do cliente'
                ], 400);
            }
           

            $insert = $this->db->insert('empresas', array(
                'empresaNome'=>$this->input->post('empresaNome'),
                'empresaCnpj'=>$this->input->post('empresaCnpj'),
                'empresaPass'=>md5($this->input->post('empresaPass') ),
                'empresaStatus'=>1
            ));

            if($insert){
                $this->response( [
                    'status' => TRUE,
                    'message' => 'Empresa inserida'
                ], 201);
            }else{
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Erro na alteração'
                ], 400);
            }

        }
    }

    public function clientes_get(){

        if($this->input->get('empresaId')){

            // echo json_encode($this->input->get('empresaId'));
            // return;
  
            $this->db->where('empresaId',$this->input->get('empresaId'));
            $result = $this->db->get('clientes');

            if($result->num_rows() > 0 ){
             
                $this->response($result->result() , 200);

            }else{

                $this->response( [
                    'status' => FALSE,
                    'message' => 'Não existem clientes'
                ], 400);
            }

        }else{

            $this->response( [
                'status' => FALSE,
                'message' => 'Especifique a empresa'
            ], 400);

        }
    }


    public function clientes_post(){

        if(!$this->input->get('empresaId')){
            $this->response( [
                    'status' => FALSE,
                    'message' => 'Informe a empresa vinculada'
                ], 200);
        }

        if($this->input->get('clienteId')){

            if(!$this->input->get('clienteNomeRazao') ){
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Especifique ao menos o nome do cliente'
                ], 400);
            }

            $this->db->where('clienteId',$this->input->get('clienteId'));
            $update = $this->db->update('clientes', array(
                'clienteNomeRazao'=>$this->input->post('clienteNomeRazao'),
                'clienteTelefone'=>$this->input->post('clienteTelefone'),
                'clienteEmail'=>$this->input->post('clienteEmail')
            ));

            if($update){
                $this->response( [
                    'status' => TRUE,
                    'message' => 'Cliente alterado'
                ], 200);
            }else{
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Erro na alteração'
                ], 304);
            }

        }else{

            if(!$this->input->post('clienteNomeRazao') ){
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Especifique ao menos o nome do cliente'
                ], 400);
            }

          
            if(!empty($this->input->post('clienteCpfCnpj') ) ){

                $this->db->where('clienteCpfCnpj',$this->input->post('clienteCpfCnpj'));
                $ifCpfCnpj = $this->db->get('clientes');

                if($ifCpfCnpj->num_rows() > 0){

                    $this->response( [
                        'status' => FALSE,
                        'message' => 'Cliente já existe'. $ifCpfCnpj->row()->clienteNomeRazao
                    ], 400);
                }                
            }
           
            $insert = $this->db->insert('clientes', array(
                'clienteNomeRazao'=>$this->input->post('clienteNomeRazao'),
                'clienteCpfCnpj'=>$this->input->post('clienteCpfCnpj'),
                'clienteTelefone'=>$this->input->post('clienteTelefone'),
                'clienteContato'=>$this->input->post('clienteContato'),
                'clienteEmail'=>$this->input->post('clienteEmail'),
                'empresaId'=>$this->input->get('empresaId')
            ));

            if($insert){
                $this->response( [
                    'status' => TRUE,
                    'message' => 'Cliente inserido. Cód: '. $this->db->insert_id()
                ], 201);
            }else{
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Erro na alteração'
                ], 400);
            }

        }
    }

    public function produtos_get(){

        if($this->input->get('prodId')){

            $this->db->where('prodId',$this->input->get('prodId'));
            $result = $this->db->get('produtos');

            if($result->num_rows() > 0 ){
                                   
                $this->response($result->row() , 200);

            }else{

                $this->response( [
                    'status' => FALSE,
                    'message' => 'Produto inexistente'
                ], 304);
            }

        }else{

            $this->db->select('prodId,prodCateg,prodCod,prodEAN,prodNome,prodPreco');
            $result = $this->db->get('produtos');

            if($result->num_rows() > 0 ){
                   
                $this->response(array('Result'=>'OK','data'=>$result->result()), 200);

            }else{

                $this->response( [
                    'status' => FALSE,
                    'message' => 'Não existem produtos'
                ], 204);
            }

        }
    }


    public function produtos_post(){

        if(!empty($this->input->get('prodId'))){

            if( empty( $this->input->post('prodNome') ) ){
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Nome obrigatorio'
                ], 400);
            }

            if( empty( $this->input->post('prodCod') ) ){
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Codigo obrigatorio'
                ], 400);
            }

            if( empty( $this->input->post('prodPreco') ) ){
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Preço obrigatorio'
                ], 400);
            }

            $this->db->where('prodId',$this->input->get('prodId'));
            $update = $this->db->update('produtos', array(
                'prodNome'=>$this->input->post('prodNome'),
                'prodCod'=>$this->input->post('prodCod'),
                'prodEAN'=>$this->input->post('prodEAN'),
                'prodPreco'=>$this->input->post('prodPreco'),
                'prodCateg'=>$this->input->post('prodCateg')
            ));

            if($update){
                $this->response( [
                    'status' => TRUE,
                    'message' => 'Produto alterado'
                ], 200);
            }else{
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Erro na alteração'
                ], 304);
            }

        }else{

            
            if( empty( $this->input->post('prodNome') ) ){
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Nome obrigatorio'
                ], 400);
            }

            if( empty( $this->input->post('prodCod') ) ){
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Codigo obrigatorio'
                ], 400);
            }

            if( empty( $this->input->post('prodPreco') ) ){
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Preço obrigatorio'
                ], 400);
            }
           
            $insert = $this->db->insert('produtos', array(
                'prodNome'=>$this->input->post('prodNome'),
                'prodCod'=>$this->input->post('prodCod'),
                'prodEAN'=>$this->input->post('prodEAN'),
                'prodPreco'=>$this->input->post('prodPreco'),
                'prodCateg'=>$this->input->post('prodCateg'),
                'empresaId'=>1
            ));

            if($insert){
                $this->response( [
                    'status' => TRUE,
                    'message' => 'Produto inserido'
                ], 201);
            }else{
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Erro ao inserir'
                ], 400);
            }

        }
    }

    public function pedidos_get(){

        if($this->input->get('pedidoId')){

            $this->db->where('pedidoId',$this->input->get('pedidoId'));
            $this->db->join('clientes as c', 'c.clienteId = pedidos.clienteId');
            $pedido = $this->db->get('pedidos');

            if($pedido->num_rows() > 0 ){

                $this->db->where('pedidoId',$this->input->get('pedidoId'));
                $this->db->join('produtos as p','p.prodId = pp.prodId');
                $produtos = $this->db->get('pedidosprodutos as pp');
                                   
                $result['pedido'] = $pedido->row();
                $result['produtos'] = array('data'=>$produtos->result() );

                $this->response(array('Result'=>'OK','data'=>$result ), 200);

            }else{

                $this->response( [
                    'status' => FALSE,
                    'message' => 'Pedido inexistente'
                ], 204);
            }

        }else{

            $this->db->select('pedidoId,pedidoData,pedidoTotal,pedidoStatus,p.clienteId,clienteNomeRazao,clienteTelefone,clienteCpfCnpj');
            $this->db->join('clientes as c','c.clienteId = p.clienteId');
            $this->db->from('pedidos as p');
            $result = $this->db->get();

            if($result->num_rows() > 0 ){
                   
                $this->response(array('Result'=>'OK','data'=>$result->result()), 200);

            }else{

                $this->response( [
                    'status' => FALSE,
                    'error' => 'Não existem pedidos',
                    'data'=> array()
                ], 200);
            }

        }
    }

    public function pedidos_post(){

        if($this->input->get('pedidoId')){

            if( empty( $this->input->post('clienteId') ) ){
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Defina um cliente'
                ], 400);
            }

            $this->db->where('pedidoId',$this->input->get('pedidoId'));
            $update = $this->db->update('pedidos', array(
                'clienteId'=>$this->input->post('clienteId'),
                'pedidoData'=>$this->input->post('pedidoData'),
                'pedidoStatus'=>$this->input->post('pedidoStatus'),
                'pedidoTotal'=>$this->input->post('pedidoTotal')
            ));

            if($update){
                $this->response( [
                    'status' => TRUE,
                    'message' => 'Cliente alterado'
                ], 200);
            }else{
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Erro na alteração'
                ], 404);
            }

        }else{

             if( empty( $this->input->get('empresaId') ) ){
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Faça o login na sua empresa'
                ], 400);
            }

            if( empty( $this->input->post('clienteId') ) ){
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Defina um cliente'
                ], 400);
            }


            $insert = $this->db->insert('pedidos', array(
                'clienteId'=>$this->input->post('clienteId'),
                'pedidoData'=>date('Y-m-d H:i:s'),
                'pedidoStatus'=>1,
                //'pedidoTotal'=>$this->input->post('pedidoTotal'),
                'empresaId'=>$this->input->get('empresaId')
            ));

            if($insert){
                $this->response( [
                    'status' => TRUE,
                    'message' => 'Pedido inserido',
                    'pedidoId'=>$this->db->insert_id()
                ], 200);
            }else{
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Erro no pedido'
                ], 404);
            }
        }
    }

    public function pedidos_produtos_post(){

        if($this->input->get('pedProdId') ){

            if( empty( $this->input->post('pedProdQtd') ) ){
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Defina uma quantidade'
                ], 400);
            } 

            if( empty( $this->input->get('pedidoId') ) ){
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Pedido desconhecido'
                ], 400);
            }

            // if(!emtpy($this->input->post('pedProdQtd'))){
            //     $pedProdQtd = $this->input->post('pedProdQtd');
            // }else{
            //     $pedProdQtd = 1;
            // }

            $subtotal = $this->input->post('pedProdPeco') * $pedProdQtd;
 
            $this->db->where('prodProdId',$this->input->get('pedProdId'));
            $update = $this->db->update('pedidosprodutos', array(
                'pedProdQtd'=>$pedProdQtd,
                'pedProdPreco'=>$this->input->post('pedProdPreco'),
                'pedProdSub'=>$subtotal
            ));

            if($update){
                $this->response( [
                    'status' => TRUE,
                    'message' => 'Produto alterado'
                ], 200);
            }else{
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Erro na alteração'
                ], 404);
            }

        }else{

             if( empty( $this->input->get('pedidoId') ) ){
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Não ha pedido'
                ], 400);
            }

            if( empty( $this->input->post('prodId') ) ){
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Defina um produto'
                ], 400);
            }

            $pedProdQtd = 1;

            $this->db->where('prodId', $this->input->post('prodId'));
            $prod = $this->db->get('produtos')->row();

            $subtotal = $prod->prodPreco * $pedProdQtd;

            $insert = $this->db->insert('pedidosprodutos', array(
                'pedProdQt'=> 1,
                'pedProdPreco'=> $prod->prodPreco,
                'pedProdSub'=> $subtotal,
                'prodId'=> $this->input->post('prodId'),
                'pedidoId'=> $this->input->get('pedidoId'),
            ));

            $this->db->select('SUM(pedProdSub) as total');
            $this->db->where('pedidoId', $this->input->get('pedidoId'));
            $this->db->from('pedidosprodutos');
            $pedido = $this->db->get();

            $this->db->where('pedidoId', $this->input->get('pedidoId') );
            $this->db->update(
                "pedidos",
                array(
                    'pedidoTotal'=> $pedido->row()->total 
                ) 
            );

            if($insert){
                $this->response( [
                    'status' => TRUE,
                    'message' => 'Produto inserido',
                    'dados'=> $pedido->row()->total
                ], 200);
            }else{
                $this->response( [
                    'status' => FALSE,
                    'message' => 'Erro'
                ], 404);
            }
        }
    }

    
    public function bancos_get(){

        if(!$this->input->get('id') ){

            $this->response( [
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], 404);
        }

        $idBanco = $this->get('id');

        $banco = BancoPorID($idBanco);


        if(!$banco){

             $this->response( [
                'status' => FALSE,
                'message' => 'No bank were found'
            ], 404);       

        }
        
        $result = $banco;
        $this->response($result, 200);
        
    }    

}