import pygame
from pygame.locals import *
base = 250
altura = 250
location_x = 50
location_y = 50
color = (135,88,146)
exit = False

if __name__ == "__main__":

    pygame.init()
    surface = pygame.display.set_mode((base, altura))
    pygame.display.set_caption("Snaky")
    background = pygame.image.load('Curso_2223/UD3/fondo_anime_2.jpg')
    pygame.display.flip()

    while not exit:

        surface.blit(background, (0 ,0))
        keys = pygame.key.get_pressed()

        for event in pygame.event.get():
            if event.type == pygame.QUIT:
                pygame.quit()
            
        if keys[K_LEFT]:
            
                
        #Pintar
        surface.fill((173,216,230))
        pygame.draw.rect(surface, color, pygame.Rect(location_x, location_y, 20, 20))
        pygame.display.flip()


