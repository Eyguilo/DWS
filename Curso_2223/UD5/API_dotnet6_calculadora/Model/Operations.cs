namespace Model
{
    public class Operations
    {
        public static int CalcularAreaTriangulo(int base_triangulo, int altura)
        {
            return (base_triangulo * altura) / 2;
        }

        public static int CalcularFactorial(int numero)
        {
            if(numero == 0)
            {
                return 1;

            } 
            else if(numero > 0)
            {
                int result = 1;
                while(numero > 0)
                {
                    result = result * numero;
                    numero--;
                }
                return result;
            }else{
                return -1;
            }

        }
    }
}