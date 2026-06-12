package ConexaoLoguinSenha; // Verifique se o nome do pacote está idêntico ao seu projeto

import java.sql.Connection;
import java.sql.Statement;
import java.sql.ResultSet;
import java.sql.DriverManager;
import java.sql.SQLException;
import javax.swing.JOptionPane;




public class ConexaoMysql {
    // Criando as variáveis públicas para conexão (necessário para o botão acessar)
    public Connection con; 
    public Statement stmt;
    public ResultSet rs;

    // Chamando o local onde está o banco com a url.    
    String url = "jdbc:mysql://localhost/projetojava";
    String user = "root";
    String password = "";
    String driver = "com.mysql.jdbc.Driver";

    // Criando a função de conexão.         
    public Connection openConnectionMysql() {
        try {
            // Carrega o driver do MySQL na memória
            Class.forName(driver); 
            // Retorna a conexão utilizando as variáveis configuradas acima
            return DriverManager.getConnection(url, user, password);
        } catch (ClassNotFoundException e) {
            JOptionPane.showMessageDialog(null, "Driver do MySQL não encontrado: " + e.getMessage());
            throw new RuntimeException(e);
        } catch (SQLException excecao) {
            JOptionPane.showMessageDialog(null, "Erro ao conectar ao banco: " + excecao.getMessage());
            throw new RuntimeException(excecao);
        }
    }
}

    

