from flask import Flask,jsonify,request


app = Flask("app")

def generar_respuesta_json(resultado,operacion):

    data = {
        "Operacion" : operacion,
        "Resultado" : str(resultado)
    }
    return jsonify(data)

@app.route('/')
def hello_world():
    return 'Hola mundo'

@app.route("/triangulo/<int:base>/<int:altura>/")
def triangulo(base, altura):

    area = base*altura/ 2

    return generar_respuesta_json(area,"calcular_area_triangulo")

@app.route("/factorial/<int:x>/")
def factorial(x):
    result = factorial_recursive(x)
    return generar_respuesta_json(result,"calcular_factorial")

def factorial_recursive(x):
    if(x == 0):
        return 1
        
    elif(x > 0):

        result = 1

        while(x < 0):

            result = result * x
            x = x -1
        
            return result
    




if __name__ == "__main__":
    app.run()