import sys
import requests
import os

def get_search_volume(keyword, api_key, search_engine_id): #  esta funcion tiene como parametros, palara clave, clave d ela api de google y el id del buscador de google
    try:
        url = f'https://www.googleapis.com/customsearch/v1?key={api_key}&cx={search_engine_id}&q={keyword}'
        response = requests.get(url)
        response.raise_for_status()
        data = response.json()
        return data['searchInformation']['totalResults'] #  retornara el numero del volumen de busqueda de la palabra
    except requests.exceptions.RequestException as e:
        print(f'Error fetching data: {e}')
        sys.exit(1)

if __name__ == '__main__':
    if len(sys.argv) < 4:
        print('Uso: python get_volume.py <keyword> <api_key> <search_engine_id>')
        sys.exit(1)
    
    keyword = sys.argv[1]
    api_key = sys.argv[2]
    search_engine_id = sys.argv[3]
    volume = get_search_volume(keyword, api_key, search_engine_id)
    print(volume)  #  Imprime el volumen de las busquedas de esa palabra
