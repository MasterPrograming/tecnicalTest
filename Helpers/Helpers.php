<?php     
    //retorna la url del proyecto
    function base_url()
    {
        return BASE_URL;
    }
    
    function media()
    {
        return BASE_URL."/Assets";
    }
    function headerAdmin($data="")
    {
        $view_header = "Views/Template/header_admin.php";
        require_once($view_header);
    }
    function footerAdmin($data="")
    {
        $view_footer = "Views/Template/footer_admin.php";
        require_once ($view_footer);
    }
    //retorna información formateada
    function dep($data)
    {
        $format = print_r('<pre>');
        $format .= print_r($data);
        $format .= print_r('</pre>');
        return $format;
    }
    //obtione un modal de bootstrap previamente creado
    function getModal(string $nameModal, $data)
    {
        $view_modal = "Views/Template/Modals/{$nameModal}.php";
        require_once $view_modal;
    }
    //obtiene usuarios de netflix directamente desde la bd
    function getUsersAccNetflix($id)
    {
        $mysql = new Mysql();
        $sql = "SELECT c.id, c.Nperfil, c.dispositivo, c.observacion, c.pingP, c.cliente_id, c.estado AS idEstado, s.name AS estado, CONCAT(cl.nombres_cliente, ' ',cl.apellidos_cliente) AS cliente,
        cl.whatsapp_cliente, cl.telefono_cliente, cl.correo_cliente, d.id_venta, d.fecha AS fecha_compra, l.Nombre AS vendedor,  l.phonenumber, l.email AS email_vendedor, l.cod_usuario, m.nombre AS metodo_pago  
        FROM creditors c 
        LEFT JOIN state s ON c.estado = s.id
        LEFT JOIN clientes cl ON c.cliente_id = cl.id_cliente
        LEFT JOIN detalle_venta d ON c.n_venta = d.id_venta   
        LEFT JOIN login l ON d.guardado_por = l.id
        LEFT JOIN metodos_pago m ON d.id_metodo_pago = m.id
        WHERE registerId = $id
        ORDER BY c.id";
        $request = $mysql->select_all($sql);
        return $request;
    }

    //Elimina exceso de espacios entre palabras
    function strClean($strCadena){
        $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strCadena);
        $string = trim($string);//elimina los espacios en blanco al inicio y final
        $string = stripslashes($string);//elimina las \ invertidas
        $string = str_ireplace("<script>","",$string);
        $string = str_ireplace("</script>","",$string);
        $string = str_ireplace("<script src>","",$string);
        $string = str_ireplace("<script type=>","",$string);
        $string = str_ireplace("SELECT * FROM","",$string);
        $string = str_ireplace("DELETE FROM","",$string);
        $string = str_ireplace("INSERT INTO","",$string);
        $string = str_ireplace("SELECT COUNT(*) FROM","",$string);
        $string = str_ireplace("DROP TABLE","",$string);
        $string = str_ireplace("OR '1'='1'","",$string);
        $string = str_ireplace('OR "1"="1"',"",$string);
        $string = str_ireplace('OR `1`=`1`',"",$string);
        $string = str_ireplace('or"1"="1',"",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("LIKE '","",$string);
        $string = str_ireplace('LIKE "',"",$string);
        $string = str_ireplace("LIKE `","",$string);
        $string = str_ireplace("OR 'a'='a","",$string);
        $string = str_ireplace('OR "a"="a',"",$string);
        $string = str_ireplace("OR `a`=`a","",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("--","",$string);
        $string = str_ireplace("^","",$string);
        $string = str_ireplace("[","",$string);
        $string = str_ireplace("]","",$string);
        $string = str_ireplace("==","",$string);
        // $string = htmlentities($string);
        $string = htmlspecialchars($string); 
        $string = addslashes($string);
        return $string;
    }    

