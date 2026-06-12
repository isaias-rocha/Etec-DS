/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package psv;


import java.sql.*;//Importação do pacote que contém a classe 

public class Conexao {//Nome da classe 
 public static Connection abrirConexao() { 
  Connection con = null; 
  try {  
                          
Class.forName("com.mysql.jdbc.Driver").newInstance(); 
                  String url = ""; 
   url += "jdbc:mysql://127.0.0.1/estacionamento?"; 
   url += "user=root&password="; 
 
   con = DriverManager.getConnection(url); 
   System.out.println("Conexão aberta."); 
  } catch (SQLException e) { 
   System.out.println(e.getMessage()); 
  } catch (ClassNotFoundException e) { 
   System.out.println(e.getMessage()); 
  } catch (Exception e) { 
   System.out.println(e.getMessage()); 
  } 
  return con; 
 } 
 
 public static void fecharConexao(Connection con) { 
  try { 
   con.close(); 
   System.out.println("Conexão fechada."); 
  } catch (SQLException e) { 
   System.out.println(e.getMessage()); 
  } catch (Exception e) { 
   System.out.println(e.getMessage()); 
  } 
 } 
}