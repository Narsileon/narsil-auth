import { cn } from "@narsil-ui/Components";
import { Link } from "@inertiajs/react";
import { Star, StarOff } from "lucide-react";
import { useTranslationsStore } from "@narsil-localization/Stores/translationStore";
import * as React from "react";
import * as TogglePrimitive from "@radix-ui/react-toggle";
import Button from "@narsil-ui/Components/Button/Button";
import TooltipWrapper from "@narsil-ui/Components/Tooltip/TooltipWrapper";
import type { ButtonProps } from "@narsil-ui/Components/Button/Button";

export interface FavoriteButtonProps extends Partial<ButtonProps> {
	isFavorite: boolean;
	modelId: number;
	modelType: string;
}

const FavoriteButton = React.forwardRef<React.ElementRef<typeof TogglePrimitive.Root>, FavoriteButtonProps>(
	({ children, isFavorite, modelId, modelType, onMouseEnter, onMouseLeave, ...props }, ref) => {
		const { trans } = useTranslationsStore();

		const buttonLabel = trans(isFavorite ? "Remove from favorites" : "Add to favorites");

		const [isHovered, setIsHovered] = React.useState(false);

		return (
			<TooltipWrapper tooltip={buttonLabel}>
				<Button
					ref={ref}
					aria-label={buttonLabel}
					asChild={true}
					size={"icon"}
					variant={"ghost"}
					onMouseEnter={(event) => {
						setIsHovered(true);

						onMouseEnter?.(event);
					}}
					onMouseLeave={(event) => {
						setIsHovered(false);

						onMouseLeave?.(event);
					}}
					{...props}
				>
					<Link
						as='button'
						href={route(isFavorite ? "favorites.remove" : "favorites.add")}
						method='post'
						data={{
							model_id: modelId,
							model_type: modelType,
						}}
						onClick={(event) => {
							event.stopPropagation();
						}}
					>
						{isFavorite && isHovered ? (
							<StarOff className='h-5 w-5' />
						) : (
							<Star
								className={cn(
									"h-5 w-5 stroke-yellow-500 opacity-0 transition-opacity group-data-[hovered=true]:opacity-100",
									{
										"fill-yellow-500": isFavorite || isHovered,
									}
								)}
							/>
						)}
					</Link>
				</Button>
			</TooltipWrapper>
		);
	}
);

export default FavoriteButton;
