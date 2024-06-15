# scripts/get_volume.py

import sys
import requests

API_KEY = 'AIzaSyBJv9TW_gPGabwybg6ampfqlUBiS0VOJSI'
SEARCH_ENGINE_ID = 'f7715df71e5bf4246'  # Puedes obtenerlo en la configuración de tu motor de búsqueda personalizado de Google

def get_search_volume(keyword):
    url = f'https://www.googleapis.com/customsearch/v1?key={API_KEY}&cx={SEARCH_ENGINE_ID}&q={keyword}'
    response = requests.get(url)
    data = response.json()
    return data['searchInformation']['totalResults']

if __name__ == '__main__':
    if len(sys.argv) < 2:
        print('Usage: python get_volume.py <keyword>')
        sys.exit(1)
    
    keyword = sys.argv[1]
    volume = get_search_volume(keyword)
    print(volume)
