using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace RPS
{
    class Program
    {
        int score = 0;
        int aiScore = 0;
        int rpsN;
        string aiRPSstring;
        int oopsie = 0;
        static void Main(string[] args)
        {
            Console.OutputEncoding = Encoding.UTF8;
            //we create an instance of program so we can access the game() function which is outside of this function
            Program program = new Program();

            Console.WriteLine("------------------------------------------------");
            Console.WriteLine();
            Console.WriteLine(" WELCOME TO SOPHIA'S ROCK PAPER AND SCISSORS GAME :3");
            Console.WriteLine(" VISIT MY WEBSITE TOO! <3");
            Console.WriteLine(" https://swrath.unbound.top");
            Console.WriteLine();

            // I call the game method to start the game
            program.game();
        }

        //we created an epic function for our game so we can conveniently rerun it at will
        void game()
        {
            //reset the oopsie value so the oopsie text wont appear anymore
            oopsie = 0;
            //show the leaderboard every round
            Console.WriteLine("------------------------------------------------");
            Console.WriteLine(" [THE LEADERBOARD]");
            Console.WriteLine(" \u058D your points are: " + score);
            Console.WriteLine(" \u058E the bots points are: " + aiScore);
            Console.WriteLine("------------------------------------------------");

            //tell the user to choose between rock, paper and scissorz.
            Console.WriteLine();
            Console.WriteLine(" choose 'rock', 'paper' or 'scissors'");
            Console.WriteLine();
            Console.WriteLine("------------------------------------------------");
            //read the users answer
            string rps = Console.ReadLine();
            Console.WriteLine("------------------------------------------------");
            Console.WriteLine();
            //translate user answer to number for easier calculation, if the user has not chosen a propper answer, they will automatically use scissors like in real life! :)
            if (rps != "")
            {
                if (rps == "rock")
                {
                    rpsN = 1;
                }
                else if (rps == "paper")
                {
                    rpsN = 2;
                }
                else if (rps == "scissors")
                {
                    rpsN = 3;
                }
                else
                {
                    rpsN = 3;
                    oopsie = 1;
                }
            }


            // Generate a random number between 1 and 3 for bot answer
            int aiRPS = new Random().Next(1, 4);

            //translate bot answer to name for answer, i kept the 'if (aiRPS != 0)' so i can close it and keep my code clean whilst i code.
            if (aiRPS != 0)
            {
                if (aiRPS == 1)
                {
                    aiRPSstring = "rock";
                }
                else if (aiRPS == 2)
                {
                    aiRPSstring = "paper";
                }
                else
                {
                    aiRPSstring = "scissors";
                }
            }


            // Print the battle results
            Console.WriteLine(" [BATTLE RESULTS]");
            Console.WriteLine();
            Console.WriteLine(" the bot chose: " + aiRPSstring + " UwU ");

            //i clear the console in every "if" statement so the console stays clean during gameplay, we run the "game" function again at the end of the statements so the user can keep playing :) we run oops aswell, which checks if the user had not entered a correct answer before (making it scissors)
            if (aiRPS == rpsN)
            {
                Console.Clear();
                oops();
                Console.WriteLine("------------------------------------------------");
                Console.WriteLine(" You tied with the bot using " + rps);
                game();
            }
            else if (aiRPS == 1 && rpsN == 3)
            {
                Console.Clear();
                oops();
                Console.WriteLine("------------------------------------------------");
                Console.WriteLine(" the bot beat you using " + aiRPSstring);
                aiScore++;
                game();
            }
            else if (aiRPS == 3 && rpsN == 1)
            {
                Console.Clear();
                oops();
                Console.WriteLine("------------------------------------------------");
                Console.WriteLine(" you beat the bot using " + rps);
                score++;
                game();
            }
            else if (aiRPS > rpsN)
            {
                Console.Clear();
                oops();
                Console.WriteLine("------------------------------------------------");
                Console.WriteLine(" the bot beat you using " + aiRPSstring);
                aiScore++;
                game();
            }
            else if (aiRPS < rpsN)
            {
                Console.Clear();
                oops();
                Console.WriteLine("------------------------------------------------");
                Console.WriteLine(" you beat the bot using " + rps);
                score++;
                game();
            }
        }

        void oops()
        {
            if (oopsie == 1)
            {
                Console.WriteLine("\"ohno, it is going too fast. i'll just go with scissors. :((\"");
            }
        }

    }
}
