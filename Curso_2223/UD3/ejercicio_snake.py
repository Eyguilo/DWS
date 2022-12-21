import pygame
from pygame.locals import *

if __name__ == "__main__":
    pygame.init()
    surface = pygame.display.set_mode((1000,500))
    pygame.display.flip() 

    location_x = 50
    location_y = 50
    color = (135,88,146)
    exit = False
    while not exit:
        
        for event in pygame.event.get():
            print(event)

            if event.type == pygame.QUIT:
                pygame.quit()
            
            #¿Se ha pulsado una tecla?
            if event.type == pygame.key.get_pressed:
                
                if event.key == pygame.K_RIGHT:
                    print("Key RIGHT has been pressed")
                    location_x+=1
                if event.key == pygame.K_DOWN:
                    print("Key DOWN has been pressed")
                    location_y+=1
                if event.key == pygame.K_UP:
                    print("Key UP has been pressed")
                    location_y-=1
                if event.key == pygame.K_LEFT:
                    print("Key LEFT has been pressed")
                    location_x-=1
                
        #Pintar
        surface.fill((173,216,230))
        pygame.draw.rect(surface, color, pygame.Rect(location_x, location_y, 60, 60))
        pygame.display.flip()


